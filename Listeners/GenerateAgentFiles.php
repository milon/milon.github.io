<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use TightenCo\Jigsaw\PageVariable;

class GenerateAgentFiles
{
    public function handle(Jigsaw $jigsaw): void
    {
        $baseUrl = rtrim((string) $jigsaw->getConfig('baseUrl'), '/');

        if ($baseUrl === '' || ! str_starts_with($baseUrl, 'http')) {
            $baseUrl = 'https://milon.im';
        }

        $posts = collect($jigsaw->getCollection('posts'));
        $talks = collect($jigsaw->getCollection('talks'));

        $this->writeHomepageMarkdown($jigsaw, $posts);
        $this->writePostsIndex($jigsaw, $posts);
        $this->writeTalksIndex($jigsaw, $talks);
        $this->writeCollectionMarkdown($jigsaw, $posts);
        $this->writeCollectionMarkdown($jigsaw, $talks);
        $this->writeLlmsTxt($jigsaw, $baseUrl, $posts, $talks);
        $this->writeAtomFeed($jigsaw, $baseUrl, $posts);
        $this->writeApiCatalog($jigsaw, $baseUrl);

        // Disable Jekyll on GitHub Pages so published .md files are served as static assets.
        $jigsaw->writeOutputFile('.nojekyll', '');
    }

    private function writeHomepageMarkdown(Jigsaw $jigsaw, $posts): void
    {
        $recent = $posts->take(5)->map(function (PageVariable $post) {
            $path = $this->normalizePath($post->getPath());
            $gist = trim((string) ($post->gist ?? ''));
            $suffix = $gist !== '' ? ': ' . $gist : '';

            return '- [' . $post->title . '](' . $path . '.md)' . $suffix;
        })->implode("\n");

        $markdown = <<<MD
# Nuruzzaman Milon

> Programmer, author, and speaker. Engineering Tech Lead building production systems that serve millions.

## About

I grew up in Dhaka, Bangladesh, and now live near Vancouver, British Columbia. Most of my days are spent on systems that have to stay up for millions of people: architecture, performance, and the unglamorous work that happens after deploy.

I write and speak about that work — what it actually takes to keep Laravel systems running once they leave a laptop.

## Writing

{$recent}

- [All writing](/posts.md)

## Books

- [Laravel After Deploy](https://laravel-after-deploy.milon.im/): Production playbook for mid-to-senior engineers (2026, English)
- [Laravel PHP Web Framework](/book/laravel.md): Bengali-language introduction to Laravel (2015)

## More

- [Talks](/talks.md)
- [CV](/cv.md)
- [Contact](/contact.md)
- [Atom feed](/feed.xml)
MD;

        $jigsaw->writeOutputFile('index.md', $markdown . "\n");
        $this->writeBooksMarkdown($jigsaw);
        $this->writeCvMarkdown($jigsaw);
        $this->writeContactMarkdown($jigsaw);
        $this->writeLaravelBookMarkdown($jigsaw);
    }

    private function writeBooksMarkdown(Jigsaw $jigsaw): void
    {
        $markdown = <<<'MD'
# Books

> Two books on Laravel, written a decade apart, for two very different readers.

HTML: [/books](/books).

## Laravel After Deploy

- **Subtitle:** Architecture, Performance & Operations at Scale
- **Language:** English
- **Published:** 2026 · August
- **ISBN:** 979-8193747345
- **Site:** [laravel-after-deploy.milon.im](https://laravel-after-deploy.milon.im/)

For mid-to-senior Laravel engineers, and for backend engineers who can read PHP and want a production playbook shown in one concrete stack — not a polyglot cookbook. The examples are Laravel; the problems are not.

## Laravel PHP Web Framework

- **Title (Bengali):** লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক
- **Publisher:** Dimik Prokashoni · two editions
- **Language:** Bengali
- **First edition:** 2015 · May
- **ISBN:** 978-9843391902
- **Details:** [/book/laravel.md](/book/laravel.md)

A Bengali-language introduction to Laravel for PHP developers looking to adopt modern framework practices.
MD;

        $jigsaw->writeOutputFile('books.md', $markdown . "\n");
    }

    private function writeCvMarkdown(Jigsaw $jigsaw): void
    {
        $markdown = <<<'MD'
# Curriculum Vitae

> Engineering Tech Lead · Vancouver, British Columbia.

HTML (PDF viewer): [/cv](/cv). Downloadable PDF: [/assets/pdf/Nuruzzaman_Milon_cv.pdf](/assets/pdf/Nuruzzaman_Milon_cv.pdf).

## Summary

Nuruzzaman Milon is an Engineering Tech Lead based near Vancouver, British Columbia. He grew up in Dhaka, Bangladesh. Most of his work is on production systems that serve millions of people: architecture, performance, and the operational work that happens after deploy.

He writes and speaks about keeping Laravel systems reliable once they leave a laptop. He is the author of *Laravel After Deploy* (2026, English) and *Laravel PHP Web Framework* (2015, Bengali).

## Focus

- Production Laravel / PHP systems at scale
- Architecture, performance, and post-deploy operations
- Writing and speaking for engineers who ship

## Elsewhere

- Site: [milon.im](https://milon.im/)
- Writing: [/posts.md](/posts.md)
- Talks: [/talks.md](/talks.md)
- Books: [/books.md](/books.md)
- Contact: [/contact.md](/contact.md)
MD;

        $jigsaw->writeOutputFile('cv.md', $markdown . "\n");
    }

    private function writeContactMarkdown(Jigsaw $jigsaw): void
    {
        $markdown = <<<'MD'
# Contact

> The fastest way to reach me is email. I read everything, and I reply to most of it.

HTML: [/contact](/contact).

## Direct

- **Email:** contact[at]milon[dot]im
- **Website:** [milon.im](https://milon.im/)
- **X:** [@to_milon](/x) — best for a quick response
- **LinkedIn:** [in/tomilon](/linkedin)

## Elsewhere

- [GitHub](/github)
- [Facebook](/facebook)
- [SlideShare](/slideshare)
- [Speaker Deck](/speakerdeck)
- [Instagram](/instagram)
- [Stack Overflow](/stackoverflow)

## Newsletter

Subscribe from the HTML contact page ([/contact](/contact)) — the form posts to Kit (ConvertKit).
MD;

        $jigsaw->writeOutputFile('contact.md', $markdown . "\n");
    }

    private function writeLaravelBookMarkdown(Jigsaw $jigsaw): void
    {
        $markdown = <<<'MD'
# Laravel PHP Web Framework

> লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক · Dimik Prokashoni · Two editions

HTML: [/book/laravel](/book/laravel). Books index: [/books.md](/books.md).

- **ISBN:** 978-984-33-9190-2
- **Publisher:** দ্বিমিক প্রকাশনী (Dimik Prokashoni)
- **1st edition:** May 2015
- **2nd edition:** August 2016

## Why

I heard a question very often: "Brother, I have learned PHP, but writing PHP inside HTML is not pleasant." Or, "Which PHP framework should I learn?" In these scenarios my general answer is Laravel — it uses cutting-edge PHP techniques and best practices, with syntax I personally prefer.

I decided to write the book because Bengali learners kept saying there was no solid local Laravel resource; almost everything was English. The Bangladeshi community had helped me for years, and this was a way to give something back.

Related essay: [/post/why-you-should-consider-laravel-as-your-go-to-framework-of-choice.md](/post/why-you-should-consider-laravel-as-your-go-to-framework-of-choice.md).

## Second edition

The second edition fixed first-edition errors (including missing code), added a full explained project, and covered features compatible with Laravel 5.3 while using Laravel 5.1 LTS for the sample project.

## Order

- Online: [rokomari.com/book/100634](https://www.rokomari.com/book/100634)
- Stores (Dhaka): Haque Library and Manik Library, Nilkhet
MD;

        $jigsaw->writeOutputFile('book/laravel.md', $markdown . "\n");
    }

    private function writePostsIndex(Jigsaw $jigsaw, $posts): void
    {
        $items = $this->formatIndexItems($posts);
        $count = $posts->count();

        $markdown = <<<MD
# Writing

> Essays on Laravel, architecture, performance, and building software that has to stay up.

{$count} posts, newest first. Prefer the Markdown links. HTML: [/posts](/posts). Atom feed: [/feed.xml](/feed.xml).

{$items}
MD;

        $jigsaw->writeOutputFile('posts.md', $markdown . "\n");
    }

    private function writeTalksIndex(Jigsaw $jigsaw, $talks): void
    {
        $items = $this->formatIndexItems($talks);
        $count = $talks->count();

        $markdown = <<<MD
# Talks

> Slides and notes from sessions on Laravel, PHP, and building for production.

{$count} talks, newest first. Prefer the Markdown links. HTML: [/talks](/talks).

{$items}
MD;

        $jigsaw->writeOutputFile('talks.md', $markdown . "\n");
    }

    private function formatIndexItems($items): string
    {
        return $items->map(function (PageVariable $page) {
            $path = $this->normalizePath($page->getPath());
            $gist = trim((string) ($page->gist ?? ''));
            $date = $this->formatDate($page->date);
            $meta = array_filter([$date, $gist !== '' ? $gist : null]);
            $suffix = $meta !== [] ? ' — ' . implode(' — ', $meta) : '';

            return '- [' . $page->title . '](' . $path . '.md)' . $suffix;
        })->implode("\n");
    }

    private function writeCollectionMarkdown(Jigsaw $jigsaw, $items): void
    {
        $sourceRoot = $jigsaw->getSourcePath();

        foreach ($items as $page) {
            $outputPath = trim($this->normalizePath($page->getPath()), '/') . '.md';
            $sourceFile = $this->findSourceFile($sourceRoot, (string) $page->getFilename());

            if ($sourceFile === null) {
                continue;
            }

            $raw = file_get_contents($sourceFile);
            $body = $this->stripFrontMatter($raw);
            $title = (string) $page->title;
            $gist = trim((string) ($page->gist ?? ''));
            $date = $this->formatDate($page->date);

            $header = "# {$title}\n\n";
            if ($gist !== '') {
                $header .= "> {$gist}\n\n";
            }
            if ($date !== '') {
                $header .= "Published: {$date}\n\n";
            }

            $jigsaw->writeOutputFile($outputPath, $header . trim($body) . "\n");
        }
    }

    private function writeLlmsTxt(Jigsaw $jigsaw, string $baseUrl, $posts, $talks): void
    {
        $recentPosts = $posts->take(12)->map(function (PageVariable $post) use ($baseUrl) {
            $path = $this->normalizePath($post->getPath());
            $gist = trim((string) ($post->gist ?? ''));
            $suffix = $gist !== '' ? ': ' . $gist : '';

            return '- [' . $post->title . '](' . $baseUrl . $path . '.md)' . $suffix;
        })->implode("\n");

        $recentTalks = $talks->take(8)->map(function (PageVariable $talk) use ($baseUrl) {
            $path = $this->normalizePath($talk->getPath());
            $gist = trim((string) ($talk->gist ?? ''));
            $suffix = $gist !== '' ? ': ' . $gist : '';

            return '- [' . $talk->title . '](' . $baseUrl . $path . '.md)' . $suffix;
        })->implode("\n");

        $content = <<<TXT
# Nuruzzaman Milon

> Personal site of Nuruzzaman Milon — Engineering Tech Lead, author of Laravel After Deploy, and speaker on Laravel, architecture, and scale.

Prefer the Markdown versions linked below. HTML pages are for humans; Markdown is the clean representation for agents. The Atom feed at {$baseUrl}/feed.xml is the dated changelog of new writing.

## Start here

- [Home]({$baseUrl}/index.md): About, recent writing, and books
- [Writing index]({$baseUrl}/posts.md): All essays
- [Talks]({$baseUrl}/talks.md): Conference and meetup talks
- [Books]({$baseUrl}/books.md): Laravel After Deploy and the Bengali Laravel book
- [CV]({$baseUrl}/cv.md): Curriculum vitae
- [Contact]({$baseUrl}/contact.md): Email and newsletter
- [Atom feed]({$baseUrl}/feed.xml): Recent posts as Atom XML

## Recent writing

{$recentPosts}

## Recent talks

{$recentTalks}

## Optional

- [Sitemap]({$baseUrl}/sitemap.xml)
- [robots.txt]({$baseUrl}/robots.txt)
- [Laravel After Deploy (external)](https://laravel-after-deploy.milon.im/)
- [Recipes (external)](https://recipes.milon.im/)
TXT;

        $jigsaw->writeOutputFile('llms.txt', $content . "\n");
    }

    private function writeAtomFeed(Jigsaw $jigsaw, string $baseUrl, $posts): void
    {
        $entries = $posts->take(25)->map(function (PageVariable $entry) use ($baseUrl) {
            $url = rtrim($entry->getUrl(), '/');
            $title = htmlspecialchars((string) $entry->title, ENT_XML1 | ENT_QUOTES, 'UTF-8');
            $gist = htmlspecialchars((string) ($entry->gist ?? ''), ENT_XML1 | ENT_QUOTES, 'UTF-8');
            $author = htmlspecialchars((string) ($entry->author ?? 'Nuruzzaman Milon'), ENT_XML1 | ENT_QUOTES, 'UTF-8');
            $atom = $this->formatAtomDate($entry->date);

            return <<<XML
    <entry>
        <id>{$url}</id>
        <link type="text/html" rel="alternate" href="{$url}" />
        <link type="text/markdown" rel="alternate" href="{$url}.md" />
        <title>{$title}</title>
        <published>{$atom}</published>
        <updated>{$atom}</updated>
        <author>
            <name>{$author}</name>
        </author>
        <summary type="html">{$gist}</summary>
    </entry>
XML;
        })->implode("\n");

        $updated = date(DATE_ATOM);
        $feed = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>milon.im</title>
    <link href="{$baseUrl}/" />
    <link type="application/atom+xml" rel="self" href="{$baseUrl}/feed.xml" />
    <updated>{$updated}</updated>
    <id>tag:milon.im,{$updated}:feed</id>
    <author>
        <name>Nuruzzaman Milon</name>
    </author>
{$entries}
</feed>
XML;

        // Canonical feed is /feed.xml. Aliases keep old subscriber URLs working
        // without a second Blade-generated feed.
        $payload = $feed . "\n";
        $jigsaw->writeOutputFile('feed.xml', $payload);
        $jigsaw->writeOutputFile('atom.xml', $payload);
        $jigsaw->writeOutputFile('rss.xml', $payload);
        $jigsaw->writeOutputFile('rss/index.html', $payload);
    }

    private function writeApiCatalog(Jigsaw $jigsaw, string $baseUrl): void
    {
        $catalog = [
            'linkset' => [
                [
                    'anchor' => $baseUrl . '/',
                    'describedby' => [
                        [
                            'href' => $baseUrl . '/llms.txt',
                            'type' => 'text/markdown',
                        ],
                    ],
                    'alternate' => [
                        [
                            'href' => $baseUrl . '/index.md',
                            'type' => 'text/markdown',
                        ],
                        [
                            'href' => $baseUrl . '/feed.xml',
                            'type' => 'application/atom+xml',
                        ],
                    ],
                    'sitemap' => [
                        [
                            'href' => $baseUrl . '/sitemap.xml',
                            'type' => 'application/xml',
                        ],
                    ],
                ],
            ],
        ];

        $dir = $jigsaw->getDestinationPath() . '/.well-known';
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents(
            $dir . '/api-catalog',
            json_encode($catalog, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . "\n"
        );
    }

    private function findSourceFile(string $sourceRoot, string $filename): ?string
    {
        $matches = glob($sourceRoot . '/_{posts,talks}/**/' . $filename . '.md', GLOB_BRACE);

        if (! $matches) {
            $matches = array_merge(
                glob($sourceRoot . '/_posts/**/' . $filename . '.md') ?: [],
                glob($sourceRoot . '/_talks/**/' . $filename . '.md') ?: [],
            );
        }

        return $matches[0] ?? null;
    }

    private function stripFrontMatter(string $raw): string
    {
        if (preg_match('/\A---\s*\n.*?\n---\s*\n(.*)\z/s', $raw, $matches)) {
            return $matches[1];
        }

        return $raw;
    }

    private function normalizePath(string $path): string
    {
        $path = '/' . ltrim($path, '/');

        return $path === '/' ? '/' : rtrim($path, '/');
    }

    private function formatDate(mixed $date): string
    {
        if ($date instanceof \DateTimeInterface) {
            return $date->format('Y-m-d');
        }

        if (is_numeric($date)) {
            return date('Y-m-d', (int) $date);
        }

        if (is_string($date) && trim($date) !== '') {
            $timestamp = strtotime($date);

            return $timestamp ? date('Y-m-d', $timestamp) : '';
        }

        return '';
    }

    private function formatAtomDate(mixed $date): string
    {
        if ($date instanceof \DateTimeInterface) {
            return $date->format(DATE_ATOM);
        }

        if (is_numeric($date)) {
            return date(DATE_ATOM, (int) $date);
        }

        if (is_string($date) && trim($date) !== '') {
            $timestamp = strtotime($date);

            if ($timestamp) {
                return date(DATE_ATOM, $timestamp);
            }
        }

        return date(DATE_ATOM);
    }
}
