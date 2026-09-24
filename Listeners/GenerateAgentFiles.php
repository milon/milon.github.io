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

## Recently

At Punt I took the backend API suite to 16k concurrent users and cut redemption fraud by 38%. Before that I shipped gift-card systems at Amazon and network inventory for FlixBus across 38 countries. I also wrote [Laravel After Deploy](https://laravel-after-deploy.milon.im/), a production playbook for Laravel at scale.

See the [full CV](/cv.md).

## About

I grew up in Dhaka, Bangladesh, and now live near Vancouver, British Columbia. Most of my days are spent on systems that have to stay up for millions of people: architecture, performance, and the unglamorous work that happens after deploy.

I write and speak about that work — what it actually takes to keep Laravel systems running once they leave a laptop.

Outside of work I cook and publish recipes, and I have developed a late interest in cars. I am the parent of a son and two daughters.

## Writing

{$recent}

- [All writing](/posts.md)

## Books

- [Laravel After Deploy](https://laravel-after-deploy.milon.im/): Production playbook for mid-to-senior engineers (2026, English)
- [Laravel PHP Web Framework](/book/laravel.md): Bengali-language introduction to Laravel (2015)

## More

- [Talks](/talks.md)
- [Open Source](/open-source.md)
- [CV](/cv.md)
- [Contact](/contact.md)
- [Atom feed](/feed.xml)
MD;

        $jigsaw->writeOutputFile('index.md', $markdown . "\n");
        $this->writeBooksMarkdown($jigsaw);
        $this->writeOpenSourceMarkdown($jigsaw);
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

    private function writeOpenSourceMarkdown(Jigsaw $jigsaw): void
    {
        $stats = $jigsaw->getConfig('barcodeStats') ?? [];
        $stars = $stats['starsLabel'] ?? '~1.5k';
        $forks = $stats['forksLabel'] ?? '300+';
        $total = $stats['downloadsTotalLabel'] ?? '15M+';
        $monthly = $stats['downloadsMonthlyLabel'] ?? '~500k';

        $markdown = <<<MD
# Open Source

> PHP packages on Packagist, led by a barcode library with {$total} downloads.

HTML: [/open-source](/open-source).

## Featured

### milon/barcode

- **Downloads:** {$total}
- **Downloads / month:** {$monthly}
- **GitHub stars:** {$stars}
- **Forks:** {$forks}
- **Stack:** PHP · Laravel
- **Packagist:** [packagist.org/packages/milon/barcode](https://packagist.org/packages/milon/barcode)
- **GitHub:** [github.com/milon/barcode](https://github.com/milon/barcode)

Barcode generation for Laravel and plain PHP. Wraps the TCPDF barcode engines (1D, QR, Data Matrix, PDF417) behind a small API that returns SVG, HTML, PNG, and JPEG — still maintained across current Laravel releases.

## Projects

- [papyrus](https://github.com/milon/papyrus) — PHP CLI for Markdown book projects (PDF, EPUB, HTML, multi-page site, Amazon KDP)
- [setu](https://github.com/milon/setu) — static URL shortener generator for GitHub Pages (npm: @to_milon/setu)
- [prepare-citizenship](https://github.com/milon/prepare-citizenship) — Canadian citizenship test study app
- [jigsaw-url-shortener](https://github.com/milon/jigsaw-url-shortener) — URL shortener for Jigsaw sites
- [macos-unijoy](https://github.com/milon/macos-unijoy) — Unijoy Bengali keyboard layout for macOS
- [dotfiles](https://github.com/milon/dotfiles) — Personal macOS dotfiles
- [system-design](https://github.com/milon/system-design) — System design interview prep
- [one-problem-a-day](https://github.com/milon/one-problem-a-day) — One DSA problem a day
- [recipes](https://github.com/milon/recipes) — Recipe sharing site ([recipes.milon.im](https://recipes.milon.im))
- [catppuccin-fresh](https://github.com/milon/catppuccin-fresh) — Catppuccin themes for Fresh Editor
- [arrow-zsh-theme](https://github.com/milon/arrow-zsh-theme) — Minimal zsh theme
- [takakori](https://github.com/milon/takakori) — Self-hosted personal finance app
- [url-shortener](https://github.com/milon/url-shortener) — Laravel URL shortener

This is a selection. The full list of repositories and contributions is on [GitHub](/github).

## Elsewhere

- [GitHub profile](/github)
- [Packagist vendor](https://packagist.org/packages/milon/)
- [npm profile](https://www.npmjs.com/~to_milon)

Also helps run phpXperts and Talk.js, the largest PHP and JavaScript communities in Bangladesh.
MD;

        $jigsaw->writeOutputFile('open-source.md', $markdown . "\n");
    }

    private function writeCvMarkdown(Jigsaw $jigsaw): void
    {
        $markdown = <<<'MD'
# Curriculum Vitae

> Engineering Tech Lead · Vancouver, British Columbia.

HTML: [/cv](/cv). PDF: [/assets/pdf/Nuruzzaman_Milon_cv.pdf](/assets/pdf/Nuruzzaman_Milon_cv.pdf).

## Contact

- Email: contact@milon.im
- Phone: +1 (604) 735-7681
- Site: [milon.im](https://milon.im/)
- LinkedIn: [/linkedin](/linkedin)
- GitHub: [/github](/github)
- X: [/x](/x)

## Summary

Software engineer with over a decade of experience across healthcare, travel, ecommerce, and gaming. Leads backend teams shipping production systems that have to stay up — architecture, performance, fraud controls, and post-deploy operations. Strongest in Laravel/PHP, with production experience in Java, TypeScript, React, and AWS.

## Experience

### Punt — Vancouver, BC, Canada

**Engineering Tech Lead** — January 2026 – Present

- Lead the engineering team for the sweepstakes casino: backend API suite and admin panel.
- Spearheaded platform expansion into new markets, including Canada and Europe.
- Drive code quality and architectural decisions across the organization.

**Senior Software Engineer** — January 2025 – January 2026

- Rewrote the legacy admin panel for chanced.com and punt.com.
- Optimized the backend API suite to handle 16k concurrent users.
- Migrated the backend API suite to current Laravel and PHP versions.
- Built fraud detection for redemptions, cutting fraudulent activity by 38%.
- Implemented load-testing infrastructure simulating up to 25k concurrent users.
- Technologies: PHP, Laravel, PostgreSQL, Redis, React, Docker, AWS, k6

### Amazon — Canada

**Software Development Engineer II** — December 2023 – December 2024 · Vancouver, BC

- Gift Card Fulfillment and Delivery Charter team.
- Migrated the Gift Card Organization’s email suite to Amazon’s new templating system.
- Technologies: Java, TypeScript, React, AWS

**Software Development Engineer II** — February 2023 – November 2023 · Toronto, ON

- Amazon Connections, UX Tech team.

### Flix — Berlin, Germany

**Senior Software Engineer** — January 2020 – January 2023

- Network inventory, ride generation, and vehicle circulation for FlixBus and FlixTrain across 38 countries on 4 continents.
- Proprietary navigation for bus drivers in FlixDriver; lost-and-found reporting that reduced lost-baggage claims by 44%.
- Technologies: PHP, Laravel, Symfony, Java, Kotlin, React Native, Kafka, SQS, MySQL, Docker, AWS, Kubernetes, GitLab CI, React, TypeScript

### Urban Sports Club — Berlin, Germany

**Senior Software Engineer** — July 2019 – December 2019

- Multi-currency payment system and new payment gateways; financing, payments, and GDPR.
- Technologies: PHP, Laravel, Symfony, Phalcon, MySQL, RabbitMQ, Redis, AWS

### Check24 — Münster, NRW, Germany

**Senior Software Engineer** — May 2018 – June 2019

- Tires, car parts, and insurance portals for Autoteile, serving over 10 million customers.
- Technologies: PHP, Symfony, Laravel, MySQL, Doctrine, React, Elasticsearch

### Telenor Health — Dhaka, Bangladesh

**Senior Software Engineer** — May 2016 – April 2018

- Digital healthcare reaching over 5.5 million people; managed 4 developers, 3 interns, 1 QA, 1 DevOps.
- SMS gateway at 3k req/s; CMS reaching 10 million people.
- Technologies: PHP, Laravel, Lumen, Node.js, Express.js, PostgreSQL, Jenkins, Docker, AWS, Ansible, Angular, XMPP

### WeDevs Ltd. — Dhaka, Bangladesh

**Software Engineer** — February 2015 – April 2016

- Rx71 health service; managed 6 developers, 2 SQA, 1 DevOps; interim CTO for 3 months.
- Technologies: PHP, Laravel, Lumen, WordPress, MySQL, Angular, IonicJS, socket.io

### Brotecs Technologies Ltd. — Dhaka, Bangladesh

**Software Engineer** — September 2013 – January 2015

- Native Android/iOS VoIP apps; Asterisk PABX GUI; airplane entertainment module for SAP-212.
- Technologies: PHP, CodeIgniter, Android SDK, Objective-C, Angular, Asterisk

### ITMedicus Bangladesh Ltd. — Dhaka, Bangladesh

**Programmer and System Analyst** — February 2011 – August 2013

- Telemedicine software for custom hardware in rural healthcare; owned codebase, database, and client communication.
- Technologies: PHP, MySQL, Redis, jQuery, Bootstrap

## Education

**Mawlana Bhashani Science and Technology University** — Tangail, Bangladesh

B.Sc. Engineering in Information and Communication Technology (ICT)

- President, Society of ICT
- Chief Organizer, 1st MBSTU ICT Fest
- Member, Rotary Club of MBSTU

## Books

- [Laravel After Deploy](https://laravel-after-deploy.milon.im/) (August 2026, ISBN 979-8193747345) — production playbook for Laravel at scale.
- [Laravel PHP Web Framework](/book/laravel.md) (May 2015, ISBN 978-9843391902) — two bestselling editions in Bangladesh and West Bengal.

## Skills

- Languages: PHP, Java, Python, Node
- Frameworks: Laravel, Symfony, React, Vue
- Data: PostgreSQL, MySQL, Redis, Elasticsearch, MongoDB, DynamoDB, Kafka, RabbitMQ
- Cloud / Ops: AWS, Docker, Kubernetes, Jenkins, Ansible, Nginx
- Practices: Microservices, REST, GraphQL, TDD, DDD, Agile / Scrum / Kanban

## Certifications

- Certified Laravel Developer — 2018
- Certified Scrum Professional — Developer — 2018
- Certified Scrum Professional — ScrumMaster — 2017
- Advanced Certified Scrum Developer — 2017
- Certified Scrum Developer — 2017
- Certified ScrumMaster — 2016

## More

- Languages spoken: English (C1), Bengali (native), German (A2)
- [Open-source packages](/open-source.md) with over 15 million downloads
- Manages phpXperts and Talk.js in Bangladesh
- Conference speaker
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
- [Open Source]({$baseUrl}/open-source.md): Packagist packages including milon/barcode
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
