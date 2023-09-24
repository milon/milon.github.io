<?php

return [
    'baseUrl' => '/',   // make sure to add a trailing `/` here
    'siteTitle' => 'milon.im',
    'siteAuthor' => 'Nuruzzaman Milon',
    'production' => false,
    'dusqusShortName' => 'milon-im',
    'newsletterUrl' => 'https://tinyletter.com/to_milon',
    'paginatationLinkNumber' => 5,
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
        '' => [
            'extends' => '_layouts.redirect',
            'items' => [
                [
                    'filename' => 'facebook',
                    'url' => 'https://www.facebook.com/milon521',
                ],
                [
                    'filename' => 'twitter',
                    'url' => 'https://twitter.com/to_milon',
                ],
                [
                    'filename' => 'github',
                    'url' => 'https://github.com/milon',
                ],
                [
                    'filename' => 'linkedin',
                    'url' => 'https://www.linkedin.com/in/tomilon',
                ],
                [
                    'filename' => 'speakerdeck',
                    'url' => 'https://speakerdeck.com/milon',
                ],
                [
                    'filename' => 'slideshare',
                    'url' => 'http://www.slideshare.net/milon521',
                ],
                [
                    'filename' => 'instagram',
                    'url' => 'https://www.instagram.com/to_milon',
                ],
                [
                    'filename' => 'stackoverflow',
                    'url' => 'https://stackoverflow.com/users/3905595/nuruzzaman-milon',
                ],
                // [
                //     'filename' => 'recipe',
                //     'url' => 'https://easy-recipes.netlify.app',
                // ],
            ]
        ],
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
