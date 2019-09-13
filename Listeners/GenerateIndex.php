<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $posts = collect($jigsaw->getCollection('posts')->map(function ($page) use ($jigsaw) {
            return [
                'title'      => $page->title,
                'categories' => $page->getCategories(),
                'link'       => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'gist'       => $page->gist,
            ];
        }));

        $talks = collect($jigsaw->getCollection('talks')->map(function ($page) use ($jigsaw) {
            return [
                'title'      => $page->title,
                'categories' => $page->getCategories(),
                'link'       => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'gist'       => $page->gist,
            ];
        })->values());

        $data = $posts->merge($talks)->values();

        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data));
    }
}
