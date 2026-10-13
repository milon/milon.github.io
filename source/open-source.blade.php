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
    @php
        $featured = $page->openSource['featured'];
        $projects = $page->openSource['projects'];
    @endphp
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Community</p>
            <h1>Open source</h1>
            <p class="sub">PHP packages on Packagist, led by a barcode library with {{ $page->barcodeStats['downloadsTotalLabel'] }} downloads.</p>
        </div>

        <section class="section">
            <h2 class="section-label">01 — Featured</h2>
            <div class="section-body is-wide">
                <div class="oss-feature">
                    <h3 class="book-title"><a href="{{ $featured['url'] }}">{{ $featured['name'] }}</a></h3>
                    <p class="book-sub">
                        <span>{{ $featured['stack'] }}</span>
                    </p>
                    <p class="book-desc">{{ $featured['description'] }}</p>
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
                    <a class="link-arrow" href="{{ $featured['url'] }}">View on GitHub →</a>
                    <a class="link-arrow oss-link-gap" href="{{ $featured['packagist'] }}">Packagist →</a>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-label">02 — Projects</h2>
            <div class="section-body is-wide">
                <div class="shelf is-text">
                    @foreach ($projects as $project)
                        <a class="shelf-item" href="{{ $project['url'] }}">
                            <span class="shelf-text">
                                <h3 class="shelf-title">{{ $project['name'] }}</h3>
                                <span class="shelf-meta">{{ $project['meta'] }}</span>
                                <span class="shelf-desc">{{ $project['description'] }}</span>
                            </span>
                        </a>
                    @endforeach
                </div>
                <p class="section-note">This is a selection. The full list of repositories and contributions is on <a href="/github">GitHub</a>.</p>
            </div>
        </section>

        <section class="section">
            <h2 class="section-label">03 — Elsewhere</h2>
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
