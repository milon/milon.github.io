<?php

/**
 * Single source of truth for open-source projects (Blade, agent markdown, JSON-LD).
 *
 * @return array{
 *     featured: array{name: string, url: string, packagist: string, stack: string, description: string},
 *     projects: list<array{name: string, url: string, meta: string, description: string, language: ?string}>
 * }
 */
return [
    'featured' => [
        'name' => 'milon/barcode',
        'url' => 'https://github.com/milon/barcode',
        'packagist' => 'https://packagist.org/packages/milon/barcode',
        'stack' => 'PHP · Laravel',
        'description' => 'Barcode generation for Laravel and plain PHP. Wraps the TCPDF barcode engines (1D, QR, Data Matrix, PDF417) behind a small API that returns SVG, HTML, PNG, and JPEG — still maintained across current Laravel releases.',
    ],
    'projects' => [
        [
            'name' => 'papyrus',
            'url' => 'https://github.com/milon/papyrus',
            'meta' => 'Packagist',
            'description' => 'PHP CLI for Markdown book projects — PDF, EPUB, HTML, multi-page site, and Amazon KDP exports.',
            'language' => 'PHP',
        ],
        [
            'name' => 'fuse',
            'url' => 'https://github.com/milon/fuse',
            'meta' => 'Packagist',
            'description' => 'HTTP-client-agnostic circuit breaker for PHP 8.2+ — optional Laravel and Saloon adapters.',
            'language' => 'PHP',
        ],
        [
            'name' => 'setu',
            'url' => 'https://github.com/milon/setu',
            'meta' => 'npm',
            'description' => 'Setu (সেতু, bridge) — generate a static URL shortener for GitHub Pages from a JSON map of slugs to URLs.',
            'language' => 'JavaScript',
        ],
        [
            'name' => 'prepare-citizenship',
            'url' => 'https://github.com/milon/prepare-citizenship',
            'meta' => 'App',
            'description' => 'Study for the Canadian citizenship test with chapter lessons, flashcards, and mock exams.',
            'language' => 'JavaScript',
        ],
        [
            'name' => 'bohurupee',
            'url' => 'https://github.com/milon/bohurupee',
            'meta' => 'Go',
            'description' => 'Local fake identity provider for OAuth and OpenID Connect — point any client at localhost and sign in as a persona.',
            'language' => 'Go',
        ],
        [
            'name' => 'jigsaw-url-shortener',
            'url' => 'https://github.com/milon/jigsaw-url-shortener',
            'meta' => 'Packagist',
            'description' => 'URL shortener package for Jigsaw-powered static sites.',
            'language' => 'PHP',
        ],
        [
            'name' => 'macos-unijoy',
            'url' => 'https://github.com/milon/macos-unijoy',
            'meta' => 'Shell',
            'description' => 'Unijoy Bengali keyboard layout for macOS.',
            'language' => 'Shell',
        ],
        [
            'name' => 'dotfiles',
            'url' => 'https://github.com/milon/dotfiles',
            'meta' => 'Shell',
            'description' => 'Personal macOS dotfiles and shell setup.',
            'language' => 'Shell',
        ],
        [
            'name' => 'system-design',
            'url' => 'https://github.com/milon/system-design',
            'meta' => 'Notes',
            'description' => 'Notes and preparation for system design interviews.',
            'language' => null,
        ],
        [
            'name' => 'one-problem-a-day',
            'url' => 'https://github.com/milon/one-problem-a-day',
            'meta' => 'Practice',
            'description' => 'One data-structure or algorithms problem a day.',
            'language' => null,
        ],
        [
            'name' => 'recipes',
            'url' => 'https://github.com/milon/recipes',
            'meta' => 'Site',
            'description' => 'Recipe sharing site — also live at recipes.milon.im.',
            'language' => 'HTML',
        ],
        [
            'name' => 'catppuccin-fresh',
            'url' => 'https://github.com/milon/catppuccin-fresh',
            'meta' => 'Theme',
            'description' => 'Catppuccin color schemes for Fresh Editor — Mocha, Macchiato, Frappé, and Latte.',
            'language' => null,
        ],
        [
            'name' => 'arrow-zsh-theme',
            'url' => 'https://github.com/milon/arrow-zsh-theme',
            'meta' => 'Theme',
            'description' => 'A minimal theme for the zsh shell.',
            'language' => 'Shell',
        ],
        [
            'name' => 'takakori',
            'url' => 'https://github.com/milon/takakori',
            'meta' => 'App',
            'description' => 'Self-hosted personal finance app.',
            'language' => 'PHP',
        ],
        [
            'name' => 'url-shortener',
            'url' => 'https://github.com/milon/url-shortener',
            'meta' => 'Laravel',
            'description' => 'A simple URL shortener built with Laravel.',
            'language' => 'PHP',
        ],
    ],
];
