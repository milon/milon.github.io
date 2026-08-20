@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'image' => 'books',
        'title' => 'milon.im | Books',
        'description' => "Books by Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Published</p>
            <h1>Books</h1>
            <p class="sub">Two books on Laravel, written a decade apart, for two very different readers.</p>
        </div>

        <section class="section">
            <div class="section-label">
                01 — English
                <span class="section-date">2026 · August</span>
            </div>
            <div class="section-body is-wide">
                <div class="book-row">
                    <img class="book-cover" src="/assets/images/book/laravel-after-deploy/cover.png" alt="Laravel After Deploy Cover">
                    <div>
                        <h2 class="book-title"><a href="https://laravel-after-deploy.milon.im/">Laravel After Deploy</a></h2>
                        <p class="book-sub">Architecture, Performance &amp; Operations at Scale</p>
                        <p class="book-desc">For mid-to-senior Laravel engineers, and for backend engineers who can read PHP and want a production playbook shown in one concrete stack — not a polyglot cookbook. The examples are Laravel; the problems are not.</p>
                        <a class="link-arrow" href="https://laravel-after-deploy.milon.im/">Learn more &amp; get your copy →</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-label">
                02 — Bengali
                <span class="section-date">2015 · May</span>
            </div>
            <div class="section-body is-wide">
                <div class="book-row">
                    <img class="book-cover" src="/assets/images/book/laravel-php-web-framework/cover_2nd_edition.jpg" alt="Laravel PHP Web Framework Cover">
                    <div>
                        <h2 class="book-title"><a href="/books/laravel">Laravel PHP Web Framework</a></h2>
                        <p class="book-sub">Dimik Prokashoni · Two editions</p>
                        <p class="book-desc">লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক — a Bengali language book on the Laravel PHP framework, covering the fundamentals for PHP developers looking to adopt modern framework practices. ISBN 978-984-33-9190-2.</p>
                        <a class="link-arrow" href="/books/laravel">More details →</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
