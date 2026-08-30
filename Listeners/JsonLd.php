<?php

namespace App\Listeners;

class JsonLd
{
    public static function encode($page): string
    {
        return json_encode(
            [
                '@context' => 'https://schema.org',
                '@graph' => static::withoutNulls(static::graph($page)),
            ],
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP
        ) ?: '{}';
    }

    public static function language($page): string
    {
        $explicit = $page->lang ?? null;

        if (is_string($explicit) && $explicit !== '') {
            return $explicit;
        }

        $text = (string) ($page->title ?? '') . ' ' . (string) ($page->gist ?? '');

        return preg_match('/\p{Bengali}/u', $text) ? 'bn' : 'en';
    }

    public static function origin($page): string
    {
        $origin = rtrim((string) $page->baseUrl, '/');

        if (! str_starts_with($origin, 'http')) {
            return 'https://milon.im';
        }

        return $origin;
    }

    public static function absoluteUrl($page, $path = null): string
    {
        $origin = static::origin($page);
        $path = $path === null ? (string) $page->getPath() : (string) $path;

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        $path = '/' . ltrim($path, '/');

        return $path === '/' ? $origin . '/' : $origin . $path;
    }

    public static function graph($page): array
    {
        $origin = static::origin($page);
        $url = static::absoluteUrl($page);
        $personId = $origin . '/#person';
        $websiteId = $origin . '/#website';
        $path = '/' . ltrim((string) $page->getPath(), '/');

        $graph = [
            static::website($page, $websiteId, $personId, $origin),
            static::person($page, $personId, $origin),
        ];

        if ($path === '/' || $path === '/cv') {
            $graph[] = static::profilePage($page, $url, $websiteId, $personId);
        } elseif (str_starts_with($path, '/post/')) {
            $graph[] = static::blogPosting($page, $url, $personId, $websiteId, 'writing');
        } elseif (str_starts_with($path, '/talk/')) {
            $graph[] = static::talkArticle($page, $url, $personId, $websiteId);
        } elseif ($path === '/book/laravel') {
            $graph[] = static::bengaliBook($page, $url, $personId);
        } elseif ($path === '/books') {
            $graph[] = static::bookList($page, $url, $websiteId, $personId);
        } else {
            $graph[] = static::webPage($page, $url, $websiteId, $personId, $path);
        }

        return $graph;
    }

    private static function website($page, string $websiteId, string $personId, string $origin): array
    {
        return [
            '@type' => 'WebSite',
            '@id' => $websiteId,
            'url' => $origin . '/',
            'name' => $page->siteTitle,
            'description' => $page->siteDescription,
            'inLanguage' => ['en', 'bn'],
            'publisher' => ['@id' => $personId],
        ];
    }

    private static function person($page, string $personId, string $origin): array
    {
        $sameAs = [];

        foreach ($page->urlRedirects ?? [] as $redirect) {
            if (! empty($redirect['url'])) {
                $sameAs[] = $redirect['url'];
            }
        }

        return [
            '@type' => 'Person',
            '@id' => $personId,
            'name' => $page->siteAuthor,
            'url' => $origin . '/',
            'jobTitle' => 'Engineering Tech Lead',
            'description' => $page->siteDescription,
            'sameAs' => array_values(array_unique($sameAs)),
        ];
    }

    private static function profilePage($page, string $url, string $websiteId, string $personId): array
    {
        return [
            '@type' => 'ProfilePage',
            '@id' => $url . '#webpage',
            'url' => $url,
            'name' => $page->documentTitle(),
            'description' => $page->metaDescription(),
            'isPartOf' => ['@id' => $websiteId],
            'mainEntity' => ['@id' => $personId],
            'inLanguage' => static::language($page),
        ];
    }

    private static function blogPosting($page, string $url, string $personId, string $websiteId, string $image): array
    {
        $data = [
            '@type' => 'BlogPosting',
            '@id' => $url . '#article',
            'headline' => (string) $page->title,
            'description' => $page->metaDescription(),
            'datePublished' => static::atomDate($page->date),
            'dateModified' => static::atomDate($page->date),
            'url' => $url,
            'mainEntityOfPage' => $url,
            'isPartOf' => ['@id' => $websiteId],
            'author' => ['@id' => $personId],
            'publisher' => ['@id' => $personId],
            'image' => static::shareImage($page, $image),
            'inLanguage' => static::language($page),
        ];

        $categories = $page->getCategories();

        if ($categories !== []) {
            $data['keywords'] = implode(', ', $categories);
        }

        return $data;
    }

    private static function talkArticle($page, string $url, string $personId, string $websiteId): array
    {
        return [
            '@type' => 'Article',
            '@id' => $url . '#article',
            'headline' => (string) $page->title,
            'description' => $page->metaDescription(),
            'datePublished' => static::atomDate($page->date),
            'dateModified' => static::atomDate($page->date),
            'url' => $url,
            'mainEntityOfPage' => $url,
            'isPartOf' => ['@id' => $websiteId],
            'author' => ['@id' => $personId],
            'publisher' => ['@id' => $personId],
            'image' => static::shareImage($page, 'talks'),
            'inLanguage' => static::language($page),
        ];
    }

    private static function bengaliBook($page, string $url, string $personId): array
    {
        return [
            '@type' => 'Book',
            '@id' => $url . '#book',
            'name' => 'Laravel PHP Web Framework',
            'alternateName' => 'লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক',
            'description' => $page->metaDescription(),
            'url' => $url,
            'isbn' => '978-984-33-9190-2',
            'inLanguage' => 'bn',
            'datePublished' => '2015-05',
            'author' => ['@id' => $personId],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Dimik Prokashoni',
            ],
            'image' => static::absoluteUrl($page, '/assets/images/book/laravel-php-web-framework/cover_2nd_edition-400.webp'),
            'bookFormat' => 'https://schema.org/Paperback',
        ];
    }

    private static function bookList($page, string $url, string $websiteId, string $personId): array
    {
        $origin = static::origin($page);

        return [
            '@type' => 'CollectionPage',
            '@id' => $url . '#webpage',
            'url' => $url,
            'name' => $page->documentTitle(),
            'description' => $page->metaDescription(),
            'isPartOf' => ['@id' => $websiteId],
            'inLanguage' => 'en',
            'mainEntity' => [
                '@type' => 'ItemList',
                'numberOfItems' => 2,
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'item' => [
                            '@type' => 'Book',
                            'name' => 'Laravel After Deploy',
                            'url' => 'https://laravel-after-deploy.milon.im/',
                            'isbn' => '979-8193747345',
                            'inLanguage' => 'en',
                            'datePublished' => '2026-08',
                            'author' => ['@id' => $personId],
                            'image' => static::absoluteUrl($page, '/assets/images/book/laravel-after-deploy/cover-400.webp'),
                        ],
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'item' => [
                            '@type' => 'Book',
                            '@id' => $origin . '/book/laravel#book',
                            'name' => 'Laravel PHP Web Framework',
                            'url' => $origin . '/book/laravel',
                            'isbn' => '978-984-33-9190-2',
                            'inLanguage' => 'bn',
                            'datePublished' => '2015-05',
                            'author' => ['@id' => $personId],
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function webPage($page, string $url, string $websiteId, string $personId, string $path): array
    {
        $type = 'WebPage';

        if ($path === '/contact') {
            $type = 'ContactPage';
        } elseif (str_starts_with($path, '/posts') || str_starts_with($path, '/talks')) {
            $type = 'CollectionPage';
        }

        return [
            '@type' => $type,
            '@id' => $url . '#webpage',
            'url' => $url,
            'name' => $page->documentTitle(),
            'description' => $page->metaDescription(),
            'isPartOf' => ['@id' => $websiteId],
            'about' => ['@id' => $personId],
            'inLanguage' => static::language($page),
        ];
    }

    private static function withoutNulls(array $data): array
    {
        foreach ($data as $key => $value) {
            if ($value === null) {
                unset($data[$key]);
            } elseif (is_array($value)) {
                $data[$key] = static::withoutNulls($value);
            }
        }

        return $data;
    }

    private static function shareImage($page, string $default): string
    {
        if ($page->ogImage) {
            $image = (string) $page->ogImage;

            return str_starts_with($image, 'http')
                ? $image
                : static::absoluteUrl($page, $image);
        }

        return static::absoluteUrl($page, '/assets/images/og/' . $default . '.png');
    }

    private static function atomDate($date): ?string
    {
        if ($date instanceof \DateTimeInterface) {
            return $date->format(DATE_ATOM);
        }

        if (is_numeric($date)) {
            return date(DATE_ATOM, (int) $date);
        }

        if (! is_string($date) || trim($date) === '') {
            return null;
        }

        $timestamp = strtotime($date);

        return $timestamp === false ? null : date(DATE_ATOM, $timestamp);
    }
}
