<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use samdark\sitemap\Sitemap;
use Illuminate\Support\Str;

class GenerateSitemap
{
    protected $exclude = [
        '/assets/*',
        '/css/*',
        '/pdf/*',
        '/images/*',
        '/CNAME',
        '*/favicon.ico',
        '*/404*',
        '/404.html',
        '/index.json',
        '/robots.txt',
        '/sitemap.xml',
        '/laravel',
    ];

    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = rtrim((string) $jigsaw->getConfig('baseUrl'), '/');

        if ($baseUrl === '' || ! str_starts_with($baseUrl, 'http')) {
            $baseUrl = 'https://milon.im';
        }

        $lastmods = $this->lastmodsByPath($jigsaw);
        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($jigsaw->getOutputPaths())->reject(function ($path) {
            return $this->isExcluded($path);
        })->each(function ($path) use ($baseUrl, $sitemap, $lastmods) {
            $normalized = $this->normalizePath($path);
            $lastmod = $lastmods[$normalized] ?? null;

            if ($lastmod === null && preg_match('#^/(posts|talks)/\d+$#', $normalized, $match)) {
                $lastmod = $lastmods['/' . $match[1]] ?? null;
            }

            $sitemap->addItem($baseUrl . $normalized, $lastmod, Sitemap::WEEKLY);
        });

        $sitemap->write();
    }

    public function isExcluded($path)
    {
        $normalized = $this->normalizePath($path);

        if (Str::is($this->exclude, $normalized)) {
            return true;
        }

        return (bool) preg_match(
            '/\.(css|js|json|xml|txt|png|jpe?g|webp|gif|svg|ico|woff2?|ttf|eot|mp4|webm|pdf|map)$/i',
            $normalized
        );
    }

    private function lastmodsByPath(Jigsaw $jigsaw): array
    {
        $lastmods = [];
        $postsByCategory = [];

        foreach ($jigsaw->getCollection('posts') as $page) {
            $path = $this->normalizePath($page->getPath());
            $timestamp = $this->toTimestamp($page->date);
            $lastmods[$path] = $timestamp;

            foreach ($page->getCategories() as $category) {
                $postsByCategory[$category] = max($postsByCategory[$category] ?? 0, $timestamp);
            }
        }

        foreach ($jigsaw->getCollection('talks') as $page) {
            $path = $this->normalizePath($page->getPath());
            $lastmods[$path] = $this->toTimestamp($page->date);
        }

        foreach ($jigsaw->getCollection('categories') as $page) {
            $path = $this->normalizePath($page->getPath());
            $slug = $page->getFilename();
            $lastmods[$path] = $postsByCategory[$slug] ?? null;
        }

        $source = $jigsaw->getSourcePath();

        foreach ([
            '/' => $source . '/index.blade.php',
            '/posts' => $source . '/posts.blade.php',
            '/talks' => $source . '/talks.blade.php',
            '/books' => $source . '/books.blade.php',
            '/cv' => $source . '/cv.blade.php',
            '/contact' => $source . '/contact.blade.php',
            '/book/laravel' => $source . '/book/laravel.blade.php',
            '/rss' => $source . '/rss.blade.php',
        ] as $path => $file) {
            if (is_file($file)) {
                $lastmods[$path] = filemtime($file);
            }
        }

        return $lastmods;
    }

    private function normalizePath($path): string
    {
        $path = '/' . ltrim((string) $path, '/');

        if ($path !== '/' && str_ends_with($path, '/index.html')) {
            $path = substr($path, 0, -11);
        }

        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        return $path === '' ? '/' : $path;
    }

    private function toTimestamp($date): ?int
    {
        if ($date instanceof \DateTimeInterface) {
            return $date->getTimestamp();
        }

        if (is_numeric($date)) {
            return (int) $date;
        }

        if (! is_string($date) || trim($date) === '') {
            return null;
        }

        $timestamp = strtotime($date);

        return $timestamp === false ? null : $timestamp;
    }
}
