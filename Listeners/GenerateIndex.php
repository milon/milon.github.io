<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use TightenCo\Jigsaw\PageVariable;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $posts = collect($jigsaw->getCollection('posts')->map(
            fn ($page) => $this->recordFromPage($page, 'post')
        ));

        $talks = collect($jigsaw->getCollection('talks')->map(
            fn ($page) => $this->recordFromPage($page, 'talk')
        ));

        $data = $posts
            ->merge($talks)
            ->merge($this->staticRecords())
            ->values();

        file_put_contents(
            $jigsaw->getDestinationPath() . '/index.json',
            json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    private function recordFromPage(PageVariable $page, string $type): array
    {
        return $this->record(
            title: (string) $page->title,
            gist: (string) ($page->gist ?? ''),
            categories: $page->getCategories(),
            link: $this->pathFromPage($page),
            type: $type,
            dateLabel: $page->formatedDate($page->date),
            isbn: '',
        );
    }

    private function staticRecords(): array
    {
        return [
            $this->record(
                title: 'Talks',
                gist: 'Slides and notes from sessions on Laravel, PHP, and building for production.',
                categories: [],
                link: '/talks',
                type: 'talk',
                dateLabel: '',
                isbn: '',
            ),
            $this->record(
                title: 'Books',
                gist: 'Two books on Laravel, written a decade apart, for two very different readers.',
                categories: [],
                link: '/books',
                type: 'book',
                dateLabel: '',
                isbn: '',
            ),
            $this->record(
                title: 'Laravel After Deploy',
                gist: 'For mid-to-senior Laravel engineers, and for backend engineers who can read PHP and want a production playbook shown in one concrete stack — not a polyglot cookbook. The examples are Laravel; the problems are not.',
                categories: [],
                link: 'https://laravel-after-deploy.milon.im/',
                type: 'book',
                dateLabel: '2026 · August',
                isbn: '979-8193747345 9798193747345',
            ),
            $this->record(
                title: 'Laravel PHP Web Framework',
                gist: 'লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক — a Bengali language book on the Laravel PHP framework, covering the fundamentals for PHP developers looking to adopt modern framework practices.',
                categories: [],
                link: '/book/laravel',
                type: 'book',
                dateLabel: '2015 · May',
                isbn: '978-9843391902 978-984-33-9190-2 9789843391902',
            ),
        ];
    }

    private function record(
        string $title,
        string $gist,
        array $categories,
        string $link,
        string $type,
        string $dateLabel,
        string $isbn,
    ): array {
        return [
            'title' => $title,
            'gist' => $gist,
            'categories' => array_values($categories),
            'link' => $link,
            'type' => $type,
            'dateLabel' => $dateLabel,
            'isbn' => $isbn,
        ];
    }

    private function pathFromPage(PageVariable $page): string
    {
        return '/' . ltrim((string) $page->getPath(), '/');
    }
}
