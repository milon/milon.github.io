<?php

return [
    'baseUrl' => '/',   // make sure to add a trailing `/` here
    'siteTitle' => 'milon.im',
    'siteAuthor' => 'Nuruzzaman Milon',
    'production' => false,
    'dusqusShortName' => 'milon-im',
    'newsletterUrl' => 'https://tinyletter.com/to_milon',
    'formatedDate' => function($page, $date) {
        return date('d F, Y', strtotime($date));
    },
    'getCategories' => function ($page) {
        return $page->categories ?? [];
    },
    'selected' => function($page, $section) {
        return ($page->getPath() === $section) ? 'selected' : '';
    },
    'social' => [
        'github' => 'https://github.com/milon',
        'twitter' => 'https://twitter.com/to_milon',
        'facebook' => 'https://www.facebook.com/page.milon.im',
        'linkedin' => 'https://www.linkedin.com/in/tomilon',
        'speakerdeck' => 'https://speakerdeck.com/milon',
        'slideshare' => 'http://www.slideshare.net/milon521',
        'instagram' => 'https://www.instagram.com/to_milon',
        'stackoverflow' => 'https://stackoverflow.com/users/3905595/nuruzzaman-milon',
    ],
    'collections' => [
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
