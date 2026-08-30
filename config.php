<?php

return [
    'baseUrl' => '/',   // make sure to add a trailing `/` here
    'siteTitle' => 'milon.im',
    'siteAuthor' => 'Nuruzzaman Milon',
    'siteDescription' => 'Programmer, author, and speaker. I lead the engineering behind production systems that serve millions.',
    'production' => false,
    'documentTitle' => function ($page, $title = null) {
        $site = (string) $page->siteTitle;
        $topic = trim((string) ($title ?? $page->title ?? ''));

        if ($topic === '' || strcasecmp($topic, $site) === 0) {
            return $site;
        }

        return $topic . ' | ' . $site;
    },
    'metaDescription' => function ($page, $fallback = null) {
        $gist = $page->gist ?? null;

        if (is_string($gist) && trim($gist) !== '') {
            return trim($gist);
        }

        if (is_string($fallback) && trim($fallback) !== '') {
            return trim($fallback);
        }

        $title = trim((string) ($page->title ?? ''));

        if ($title !== '') {
            return $title;
        }

        return (string) ($page->siteDescription ?? '');
    },
    'isIndexable' => function ($page) {
        $path = '/' . ltrim((string) $page->getPath(), '/');

        return ! in_array($path, ['/404', '/404.html', '/laravel'], true)
            && $page->getFilename() !== '404';
    },
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
