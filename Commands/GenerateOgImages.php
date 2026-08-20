<?php

namespace App\Commands;

class GenerateOgImages
{
    private const WIDTH = 1200;
    private const HEIGHT = 630;

    private const CARDS = [
        'default' => [
            't' => 'Building software that scales *to millions of users.*',
        ],
        'writing' => [
            's' => 'Writing',
            't' => 'Notes on code, systems, and *everything around them.*',
        ],
        'books' => [
            's' => 'Books',
            't' => 'Two books on Laravel, *written a decade apart.*',
        ],
        'talks' => [
            's' => 'Talks',
            't' => 'Slides and notes from *conferences and meetups.*',
        ],
        'cv' => [
            's' => 'CV',
            't' => 'Engineering Tech Lead, *building for scale.*',
        ],
        'contact' => [
            's' => 'Contact',
            't' => 'Say hello, or *subscribe to the newsletter.*',
        ],
    ];

    public function run(array $argv): int
    {
        $root = dirname(__DIR__);
        $outputDir = $root . '/source/assets/images/og';
        $names = $this->requestedCards($argv);

        if ($names === null) {
            return 1;
        }

        $chrome = $this->chromeBinary();
        if ($chrome === null) {
            fwrite(STDERR, "Could not find Google Chrome or Chromium. Set CHROME_PATH.\n");
            return 1;
        }

        if (! is_dir($outputDir) && ! mkdir($outputDir, 0755, true) && ! is_dir($outputDir)) {
            fwrite(STDERR, "Could not create {$outputDir}\n");
            return 1;
        }

        $port = $this->freePort();
        $server = $this->startServer($root . '/source', $port);

        try {
            $this->waitForServer($port);

            foreach ($names as $name) {
                $path = $outputDir . '/' . $name . '.png';
                $query = http_build_query(self::CARDS[$name]);
                $url = "http://127.0.0.1:{$port}/_assets/og/template.html?{$query}";

                $this->screenshot($chrome, $url, $path);
                echo "wrote {$path}\n";
            }
        } finally {
            $this->stopServer($server);
        }

        return 0;
    }

    private function requestedCards(array $argv): ?array
    {
        $requested = array_values(array_filter(array_slice($argv, 1), fn ($arg) => $arg !== '--'));

        if ($requested === []) {
            return array_keys(self::CARDS);
        }

        foreach ($requested as $name) {
            if (! isset(self::CARDS[$name])) {
                fwrite(STDERR, "Unknown card '{$name}'. Known: " . implode(', ', array_keys(self::CARDS)) . "\n");
                return null;
            }
        }

        return $requested;
    }

    private function chromeBinary(): ?string
    {
        $candidates = array_filter([
            getenv('CHROME_PATH') ?: null,
            '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome',
            '/Applications/Chromium.app/Contents/MacOS/Chromium',
            'google-chrome',
            'chromium',
            'chromium-browser',
        ]);

        foreach ($candidates as $binary) {
            if (str_contains($binary, '/')) {
                if (is_executable($binary)) {
                    return $binary;
                }
                continue;
            }

            $resolved = trim((string) shell_exec('command -v ' . escapeshellarg($binary) . ' 2>/dev/null'));
            if ($resolved !== '') {
                return $resolved;
            }
        }

        return null;
    }

    private function freePort(): int
    {
        $socket = stream_socket_server('tcp://127.0.0.1:0', $errno, $errstr);
        if ($socket === false) {
            throw new \RuntimeException("Could not bind a local port: {$errstr}");
        }

        $name = stream_socket_get_name($socket, false);
        fclose($socket);

        return (int) substr($name, strrpos($name, ':') + 1);
    }

    private function startServer(string $docRoot, int $port): array
    {
        $descriptor = [
            0 => ['pipe', 'r'],
            1 => ['file', '/dev/null', 'w'],
            2 => ['file', '/dev/null', 'w'],
        ];

        $process = proc_open(
            sprintf('php -S 127.0.0.1:%d -t %s', $port, escapeshellarg($docRoot)),
            $descriptor,
            $pipes,
            $docRoot
        );

        if (! is_resource($process)) {
            throw new \RuntimeException('Could not start PHP’s built-in server.');
        }

        fclose($pipes[0]);

        return ['process' => $process];
    }

    private function waitForServer(int $port, int $timeoutMs = 3000): void
    {
        $deadline = microtime(true) + ($timeoutMs / 1000);

        while (microtime(true) < $deadline) {
            $fp = @fsockopen('127.0.0.1', $port, $errno, $errstr, 0.1);
            if (is_resource($fp)) {
                fclose($fp);
                return;
            }
            usleep(50000);
        }

        throw new \RuntimeException("PHP server did not start on port {$port}.");
    }

    private function stopServer(array $server): void
    {
        if (! isset($server['process']) || ! is_resource($server['process'])) {
            return;
        }

        $status = proc_get_status($server['process']);
        if (! empty($status['pid'])) {
            posix_kill((int) $status['pid'], SIGTERM);
        }

        proc_close($server['process']);
    }

    private function screenshot(string $chrome, string $url, string $path): void
    {
        $command = implode(' ', [
            escapeshellarg($chrome),
            '--headless=new',
            '--disable-gpu',
            '--hide-scrollbars',
            '--force-device-scale-factor=1',
            '--virtual-time-budget=20000',
            '--window-size=' . self::WIDTH . ',' . self::HEIGHT,
            '--screenshot=' . escapeshellarg($path),
            escapeshellarg($url),
            '>/dev/null 2>&1',
        ]);

        passthru($command, $code);

        if ($code !== 0 || ! is_file($path)) {
            throw new \RuntimeException("Chrome failed to render {$url} (exit {$code}).");
        }
    }
}
