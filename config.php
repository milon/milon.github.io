<?php

return [
    'baseUrl' => '/',   // make sure to add a trailing `/` here
    'siteTitle' => 'milon.im',
    'siteAuthor' => 'Nuruzzaman Milon',
    'production' => false,
    'dusqusShortName' => 'milon-im',
    'newsletterUrl' => 'https://tinyletter.com/to_milon',
    'paginatationLinkNumber' => 5,
    'urlRedirects' => require_once(__DIR__ . '/redirects.php'),
    'formatedDate' => function($page, $date) {
        return date('d F, Y', strtotime($date));
    },
    'getCategories' => function ($page) {
        return $page->categories ?? [];
    },
    'selected' => function($page, $section) {
        return ($page->getPath() === $section) ? 'selected' : '';
    },
    'collections' => [
        // '' => [
        //     'extends' => '_layouts.redirect',
        //     'items' => require_once(__DIR__.'/redirects.php'),
        // ],
        'posts' => [
            'path' => 'post/{filename}',
            'sort' => '-date',
        ],
        'talks' => [
            'path' => 'talk/{filename}',
            'sort' => '-date',
        ],
    ],
];
