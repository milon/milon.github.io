---
title: Open Source
gist: PHP packages on Packagist, led by a barcode library with over 15 million downloads.
---

@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'image' => 'open-source',
        'description' => "Open-source packages by Nuruzzaman Milon — including milon/barcode with over 15 million downloads.",
    ])
@endsection

@section('body')
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Community</p>
            <h1>Open source</h1>
            <p class="sub">PHP packages on Packagist, led by a barcode library with {{ $page->barcodeStats['downloadsTotalLabel'] }} downloads.</p>
        </div>

        <section class="section">
            <div class="section-label">01 — Featured</div>
            <div class="section-body is-wide">
                <div class="oss-feature">
                    <h2 class="book-title"><a href="https://github.com/milon/barcode">milon/barcode</a></h2>
                    <p class="book-sub">
                        <span>PHP · Laravel</span>
                    </p>
                    <p class="book-desc">Barcode generation for Laravel and plain PHP. Wraps the TCPDF barcode engines (1D, QR, Data Matrix, PDF417) behind a small API that returns SVG, HTML, PNG, and JPEG — still maintained across current Laravel releases.</p>
                    <div class="oss-stats" aria-label="Package stats">
                        <div class="oss-stat">
                            <span class="oss-stat-value">{{ $page->barcodeStats['starsLabel'] }}</span>
                            <span class="oss-stat-label">GitHub stars</span>
                        </div>
                        <div class="oss-stat">
                            <span class="oss-stat-value">{{ $page->barcodeStats['downloadsTotalLabel'] }}</span>
                            <span class="oss-stat-label">Total installs</span>
                        </div>
                        <div class="oss-stat">
                            <span class="oss-stat-value">{{ $page->barcodeStats['downloadsMonthlyLabel'] }}</span>
                            <span class="oss-stat-label">Installs / month</span>
                        </div>
                        <div class="oss-stat">
                            <span class="oss-stat-value">{{ $page->barcodeStats['forksLabel'] }}</span>
                            <span class="oss-stat-label">Forks</span>
                        </div>
                    </div>
                    <a class="link-arrow" href="https://github.com/milon/barcode">View on GitHub →</a>
                    <a class="link-arrow oss-link-gap" href="https://packagist.org/packages/milon/barcode">Packagist →</a>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-label">02 — Projects</div>
            <div class="section-body is-wide">
                <div class="shelf is-text">
                    <a class="shelf-item" href="https://github.com/milon/papyrus">
                        <span class="shelf-text">
                            <h3 class="shelf-title">papyrus</h3>
                            <span class="shelf-meta">Packagist</span>
                            <span class="shelf-desc">PHP CLI for Markdown book projects — PDF, EPUB, HTML, multi-page site, and Amazon KDP exports.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/setu">
                        <span class="shelf-text">
                            <h3 class="shelf-title">setu</h3>
                            <span class="shelf-meta">npm</span>
                            <span class="shelf-desc">Setu (সেতু, bridge) — generate a static URL shortener for GitHub Pages from a JSON map of slugs to URLs.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/prepare-citizenship">
                        <span class="shelf-text">
                            <h3 class="shelf-title">prepare-citizenship</h3>
                            <span class="shelf-meta">App</span>
                            <span class="shelf-desc">Study for the Canadian citizenship test with chapter lessons, flashcards, and mock exams.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/jigsaw-url-shortener">
                        <span class="shelf-text">
                            <h3 class="shelf-title">jigsaw-url-shortener</h3>
                            <span class="shelf-meta">Packagist</span>
                            <span class="shelf-desc">URL shortener package for Jigsaw-powered static sites.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/macos-unijoy">
                        <span class="shelf-text">
                            <h3 class="shelf-title">macos-unijoy</h3>
                            <span class="shelf-meta">Shell</span>
                            <span class="shelf-desc">Unijoy Bengali keyboard layout for macOS.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/dotfiles">
                        <span class="shelf-text">
                            <h3 class="shelf-title">dotfiles</h3>
                            <span class="shelf-meta">Shell</span>
                            <span class="shelf-desc">Personal macOS dotfiles and shell setup.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/system-design">
                        <span class="shelf-text">
                            <h3 class="shelf-title">system-design</h3>
                            <span class="shelf-meta">Notes</span>
                            <span class="shelf-desc">Notes and preparation for system design interviews.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/one-problem-a-day">
                        <span class="shelf-text">
                            <h3 class="shelf-title">one-problem-a-day</h3>
                            <span class="shelf-meta">Practice</span>
                            <span class="shelf-desc">One data-structure or algorithms problem a day.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/recipes">
                        <span class="shelf-text">
                            <h3 class="shelf-title">recipes</h3>
                            <span class="shelf-meta">Site</span>
                            <span class="shelf-desc">Recipe sharing site — also live at recipes.milon.im.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/catppuccin-fresh">
                        <span class="shelf-text">
                            <h3 class="shelf-title">catppuccin-fresh</h3>
                            <span class="shelf-meta">Theme</span>
                            <span class="shelf-desc">Catppuccin color schemes for Fresh Editor — Mocha, Macchiato, Frappé, and Latte.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/arrow-zsh-theme">
                        <span class="shelf-text">
                            <h3 class="shelf-title">arrow-zsh-theme</h3>
                            <span class="shelf-meta">Theme</span>
                            <span class="shelf-desc">A minimal theme for the zsh shell.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/takakori">
                        <span class="shelf-text">
                            <h3 class="shelf-title">takakori</h3>
                            <span class="shelf-meta">App</span>
                            <span class="shelf-desc">Self-hosted personal finance app.</span>
                        </span>
                    </a>
                    <a class="shelf-item" href="https://github.com/milon/url-shortener">
                        <span class="shelf-text">
                            <h3 class="shelf-title">url-shortener</h3>
                            <span class="shelf-meta">Laravel</span>
                            <span class="shelf-desc">A simple URL shortener built with Laravel.</span>
                        </span>
                    </a>
                </div>
                <p class="section-note">This is a selection. The full list of repositories and contributions is on <a href="/github">GitHub</a>.</p>
            </div>
        </section>

        <section class="section">
            <div class="section-label">03 — Elsewhere</div>
            <div class="section-body is-wide">
                <ul class="elsewhere">
                    <li><a href="/github">GitHub profile <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="https://packagist.org/packages/milon/">Packagist vendor <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="https://www.npmjs.com/~to_milon">npm profile <span class="ar" aria-hidden="true">↗</span></a></li>
                </ul>
                <p class="section-note">I also help run phpXperts and Talk.js, the largest PHP and JavaScript communities in Bangladesh.</p>
            </div>
        </section>
    </div>
@endsection
