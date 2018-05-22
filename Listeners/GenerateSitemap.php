<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use samdark\sitemap\Sitemap;

class GenerateSitemap
{
    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = 'https://milon.im';
        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($jigsaw->getOutputPaths())->each(function ($path) use ($baseUrl, $sitemap) {
            if (! $this->isAsset($path)) {
                $sitemap->addItem($baseUrl . $path, time(), Sitemap::DAILY);
            }
        });

        $sitemap->write();
    }

    public function isAsset($path)
    {
        return starts_with($path, '/assets')
            || starts_with($path, '/css')
            || starts_with($path, '/pdf') 
            || starts_with($path, '/images');
    }
}
