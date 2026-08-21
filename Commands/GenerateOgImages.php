<?php

namespace App\Commands;

class GenerateOgImages
{
    private const WIDTH = 1200;
    private const HEIGHT = 630;

    /** The template's --paper background, used to tell a real card from an error page. */
    private const PAPER = [0xFB, 0xFB, 0xFA];

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
            $this->assertTemplateReady($chrome, $port);
            $this->warnIfUnoptimized();

            foreach ($names as $name) {
                $path = $outputDir . '/' . $name . '.png';
                $query = http_build_query(self::CARDS[$name]);
                $url = "http://127.0.0.1:{$port}/_assets/og/template.html?{$query}";

                $this->screenshot($chrome, $url, $path);
                $this->assertCard($path, 'render');

                $this->optimizePng($path);
                $this->assertCard($path, 'optimize');

                echo "wrote {$path} (" . self::WIDTH . 'x' . self::HEIGHT . ', '
                    . $this->formatBytes((int) filesize($path)) . ")\n";
            }
        } catch (\RuntimeException $e) {
            fwrite(STDERR, $e->getMessage() . "\n");
            return 1;
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

    /**
     * Chrome exits 0 and still writes a full-size PNG when the page fails to load, so the
     * exit code proves nothing. Render the template once up front and let it tell us whether
     * its webfonts actually arrived, rather than baking a fallback-font card into the repo.
     */
    private function assertTemplateReady(string $chrome, int $port): void
    {
        $command = implode(' ', [
            escapeshellarg($chrome),
            '--headless=new',
            '--disable-gpu',
            '--virtual-time-budget=20000',
            '--dump-dom',
            escapeshellarg("http://127.0.0.1:{$port}/_assets/og/template.html"),
            '2>/dev/null',
        ]);

        $dom = (string) shell_exec($command);

        if (str_contains($dom, 'data-og-status="ready"')) {
            return;
        }

        $reason = str_contains($dom, 'data-og-status="font-missing"')
            ? 'Newsreader or 0xProto did not load, so the cards would render in a fallback face.'
            : 'the template did not render — Chrome most likely showed an error page.';

        throw new \RuntimeException("Refusing to write cards: {$reason}");
    }

    private function warnIfUnoptimized(): void
    {
        if ($this->findBinary('pngquant') !== null || $this->findBinary('optipng') !== null) {
            return;
        }

        if ($this->findBinary('magick') !== null) {
            return;
        }

        fwrite(STDERR, "Warning: no pngquant, optipng or magick on PATH — cards will be ~4x larger than they need to be.\n");
        fwrite(STDERR, "         brew install pngquant optipng\n");
    }

    /**
     * A card is only finished if it is exactly 1200x630 and still sitting on the template's
     * paper background — an error page or a blank render fails the corner check.
     */
    private function assertCard(string $path, string $stage): void
    {
        $size = @getimagesize($path);

        if ($size === false) {
            throw new \RuntimeException("{$stage}: {$path} is not a readable image.");
        }

        [$width, $height] = $size;

        if ($width !== self::WIDTH || $height !== self::HEIGHT) {
            throw new \RuntimeException(
                "{$stage}: expected " . self::WIDTH . 'x' . self::HEIGHT . ", got {$width}x{$height} in {$path}."
            );
        }

        if (! function_exists('imagecreatefrompng')) {
            return;
        }

        $image = @imagecreatefrompng($path);

        if ($image === false) {
            throw new \RuntimeException("{$stage}: could not decode {$path}.");
        }

        foreach ([[2, 2], [self::WIDTH - 3, self::HEIGHT - 3]] as [$x, $y]) {
            $pixel = imagecolorsforindex($image, imagecolorat($image, $x, $y));

            if ([$pixel['red'], $pixel['green'], $pixel['blue']] !== self::PAPER) {
                throw new \RuntimeException(
                    "{$stage}: {$path} does not look like a card — pixel at {$x},{$y} is not the paper background."
                );
            }
        }
    }

    private function optimizePng(string $path): void
    {
        $pngquant = $this->findBinary('pngquant');
        if ($pngquant !== null) {
            $this->runQuiet(
                implode(' ', [
                    escapeshellarg($pngquant),
                    '--quality=65-90',
                    '--skip-if-larger',
                    '--speed=1',
                    '--ext=.png',
                    '--force',
                    escapeshellarg($path),
                ])
            );
        }

        $optipng = $this->findBinary('optipng');
        if ($optipng !== null) {
            $this->runQuiet(escapeshellarg($optipng) . ' -o2 -quiet ' . escapeshellarg($path));
            return;
        }

        $magick = $this->findBinary('magick');
        if ($pngquant === null && $magick !== null) {
            $this->runQuiet(implode(' ', [
                escapeshellarg($magick),
                escapeshellarg($path),
                '-strip',
                '-define png:compression-level=9',
                escapeshellarg($path),
            ]));
        }
    }

    private function findBinary(string $name): ?string
    {
        $candidates = [
            '/opt/homebrew/bin/' . $name,
            '/usr/local/bin/' . $name,
            $name,
        ];

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

    private function runQuiet(string $command): void
    {
        exec($command . ' >/dev/null 2>&1');
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes < 1024) {
            return $bytes . ' B';
        }

        return number_format($bytes / 1024, 1) . ' KB';
    }
}
