<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateCategoryCollection
{
    public function handle(Jigsaw $jigsaw)
    {
        $source = $jigsaw->getSourcePath();
        $postsPath = $source . '/_posts';
        $categoriesPath = $source . '/_categories';

        if (! is_dir($categoriesPath)) {
            mkdir($categoriesPath, 0755, true);
        }

        $categories = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($postsPath, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->getExtension() !== 'md') {
                continue;
            }

            $contents = file_get_contents($file->getPathname());

            if (! preg_match('/^categories:\s*\[(.*?)\]\s*$/m', $contents, $match)) {
                continue;
            }

            foreach (explode(',', $match[1]) as $category) {
                $slug = trim($category);

                if ($slug !== '' && preg_match('/^[a-z0-9-]+$/', $slug)) {
                    $categories[$slug] = true;
                }
            }
        }

        $categories = array_keys($categories);
        sort($categories);

        $written = [];

        foreach ($categories as $slug) {
            $path = $categoriesPath . '/' . $slug . '.md';
            $written[] = $slug . '.md';
            $contents = "---\nextends: _layouts.category\ntitle: {$slug}\n---\n";

            if (! is_file($path) || file_get_contents($path) !== $contents) {
                file_put_contents($path, $contents);
            }
        }

        foreach (glob($categoriesPath . '/*.md') ?: [] as $existing) {
            if (! in_array(basename($existing), $written, true)) {
                unlink($existing);
            }
        }
    }
}
