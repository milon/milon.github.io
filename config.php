<?php

return [
    'baseUrl' => '/',   // make sure to add a trailing `/` here
    'production' => false,

    // functions
    'base' => function($page) {
        if($page->production) return 'https://milon.github.io/';
        return '/';
    },
    'formatedDate' => function($page, $date) {
        return date('d F, Y', strtotime($date));
    },
    'social' => [
        'github' => 'https://github.com/milon',
        'twitter' => 'https://twitter.com/to_milon',
        'facebook' => 'https://web.facebook.com/milon521',
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
        ]
    ],
];
