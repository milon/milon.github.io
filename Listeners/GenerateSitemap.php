<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use samdark\sitemap\Sitemap;
use Illuminate\Support\Str;

class GenerateSitemap
{
    protected $exclude = [
        '/css/*',
        '/pdf/*',
        '/images/*',
        '/CNAME',
        '*/favicon.ico',
        '*/404*',
    ];

    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = 'https://milon.im';

        if (! $baseUrl) {
            echo("\nTo generate a sitemap.xml file, please specify a 'baseUrl' in config.php.\n\n");
            return;
        }

        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($jigsaw->getOutputPaths())->reject(function ($path) {
                return $this->isExcluded($path);
            })->each(function ($path) use ($baseUrl, $sitemap) {
                $sitemap->addItem($baseUrl . $path, time(), Sitemap::DAILY);
            });

        $sitemap->write();
    }

    public function isExcluded($path)
    {
        return Str::is($this->exclude, $path);
    }
}
