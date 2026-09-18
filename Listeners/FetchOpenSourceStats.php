<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class FetchOpenSourceStats
{
    private const GITHUB_REPO = 'milon/barcode';
    private const PACKAGIST_PACKAGE = 'milon/barcode';

    /** Fallback values used when an API is unreachable so the build still succeeds. */
    private const FALLBACK = [
        'stars' => 1480,
        'forks' => 326,
        'downloadsTotal' => 15600000,
        'downloadsMonthly' => 530000,
    ];

    public function handle(Jigsaw $jigsaw): void
    {
        $github = $this->fetchGithub();
        $packagist = $this->fetchPackagist();

        $stars = $github['stars'] ?? self::FALLBACK['stars'];
        $forks = $github['forks'] ?? self::FALLBACK['forks'];
        $downloadsTotal = $packagist['downloadsTotal'] ?? self::FALLBACK['downloadsTotal'];
        $downloadsMonthly = $packagist['downloadsMonthly'] ?? self::FALLBACK['downloadsMonthly'];

        $jigsaw->setConfig('barcodeStats', [
            'stars' => $stars,
            'forks' => $forks,
            'downloadsTotal' => $downloadsTotal,
            'downloadsMonthly' => $downloadsMonthly,
            'starsLabel' => $this->compact($stars),
            'forksLabel' => $this->compact($forks),
            'downloadsTotalLabel' => $this->compact($downloadsTotal),
            'downloadsMonthlyLabel' => $this->compact($downloadsMonthly),
            'fetchedAt' => date('c'),
            'live' => $github !== null && $packagist !== null,
        ]);
    }

    private function fetchGithub(): ?array
    {
        $headers = [
            'User-Agent: milon.im-site-build',
            'Accept: application/vnd.github+json',
        ];

        $token = getenv('GITHUB_TOKEN') ?: getenv('GH_TOKEN');

        if (is_string($token) && $token !== '') {
            $headers[] = 'Authorization: Bearer ' . $token;
        }

        $data = $this->getJson(
            'https://api.github.com/repos/' . self::GITHUB_REPO,
            $headers
        );

        if ($data === null || ! isset($data['stargazers_count'], $data['forks_count'])) {
            return null;
        }

        return [
            'stars' => (int) $data['stargazers_count'],
            'forks' => (int) $data['forks_count'],
        ];
    }

    private function fetchPackagist(): ?array
    {
        $data = $this->getJson(
            'https://packagist.org/packages/' . self::PACKAGIST_PACKAGE . '.json',
            ['User-Agent: milon.im-site-build']
        );

        if ($data === null || ! isset($data['package']['downloads']['total'], $data['package']['downloads']['monthly'])) {
            return null;
        }

        $downloads = $data['package']['downloads'];

        return [
            'downloadsTotal' => (int) $downloads['total'],
            'downloadsMonthly' => (int) $downloads['monthly'],
        ];
    }

    private function getJson(string $url, array $headers): ?array
    {
        $headerLine = implode("\r\n", $headers);
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => $headerLine,
                'timeout' => 12,
                'ignore_errors' => true,
            ],
        ]);

        $body = @file_get_contents($url, false, $context);

        if ($body === false || $body === '') {
            return null;
        }

        $decoded = json_decode($body, true);

        return is_array($decoded) ? $decoded : null;
    }

    private function compact(int $number): string
    {
        if ($number >= 1_000_000) {
            $value = $number / 1_000_000;

            return $this->trimDecimal($value) . 'M';
        }

        if ($number >= 1_000) {
            $value = $number / 1_000;

            return $this->trimDecimal($value) . 'k';
        }

        return (string) $number;
    }

    private function trimDecimal(float $value): string
    {
        $rounded = round($value, 1);

        if (abs($rounded - round($rounded)) < 0.05) {
            return (string) (int) round($rounded);
        }

        return number_format($rounded, 1, '.', '');
    }
}
