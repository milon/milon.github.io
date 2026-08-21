<?php

return [
    'baseUrl' => '/',   // make sure to add a trailing `/` here
    'siteTitle' => 'milon.im',
    'siteAuthor' => 'Nuruzzaman Milon',
    'production' => false,
    'dusqusShortName' => 'milon-im',
    'paginatationLinkNumber' => 5,
    'urlRedirects' => require_once(__DIR__ . '/redirects.php'),
    'formatedDate' => function ($page, $date, $withDay = true) {
        if ($date instanceof DateTimeInterface) {
            $timestamp = $date->getTimestamp();
        } elseif (is_numeric($date)) {
            $timestamp = (int) $date;
        } else {
            $timestamp = strtotime((string) $date);
        }

        $formatted = date('Y', $timestamp) . ' · ' . date('F', $timestamp);

        if ($withDay) {
            $formatted .= ' · ' . date('d', $timestamp);
        }

        return $formatted;
    },
    'getCategories' => function ($page) {
        $categories = $page->categories ?? [];

        if ($categories instanceof \Illuminate\Support\Collection) {
            return $categories->values()->all();
        }

        return is_array($categories) ? array_values($categories) : [];
    },
    'categoryPath' => function ($page, $category) {
        return '/posts/category/' . $category;
    },
    'selected' => function($page, $section) {
        return ($page->getPath() === $section) ? 'selected' : '';
    },
    'collections' => [
        'posts' => [
            'path' => 'post/{filename}',
            'sort' => '-date',
        ],
        'talks' => [
            'path' => 'talk/{filename}',
            'sort' => '-date',
        ],
        'categories' => [
            'path' => 'posts/category/{filename}',
        ],
    ],
];
