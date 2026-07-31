@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | Books',
        'description' => "Books by Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="book-page">
        <h2>Books</h2>

        <section class="book-editions">
            <div class="book-edition">
                <img class="book" src="/assets/images/book/laravel-after-deploy/cover.png" alt="Laravel in Production Cover">
                <div class="book-content">
                    <h3>Laravel After Deploy <span class="badge-coming-soon">Coming Soon</span></h3>
                    <p class="book-subtitle">Architecture, Performance, and Operations at Scale</p>
                    <p>For the mid-to-senior Laravel engineer who already knows how to build an application and is now the one handed the architecture decisions, the performance incident, and the migration that has to happen without a maintenance window.</p>
                    <p>PDF (light & dark mode) · EPUB</p>
                    <p><a href="https://laravel-after-deploy.milon.im/">Learn more & get notified →</a></p>
                </div>
            </div>

            <div class="book-edition">
                <img class="book" src="/assets/images/book/laravel-php-web-framework/cover_2nd_edition.jpg" alt="Laravel PHP Web Framework Cover">
                <div class="book-content">
                    <h3>Laravel PHP Web Framework</h3>
                    <p class="book-subtitle">লারাভেল পিএইচপি ওয়েব ফ্রেমওয়ার্ক</p>
                    <p>A Bengali language book on the Laravel PHP framework, covering the fundamentals of Laravel for PHP developers looking to adopt modern framework practices.</p>
                    <p>Published by Dimik Prokashoni. ISBN: 978-984-33-9190-2</p>
                    <p><a href="/books/laravel">More details →</a></p>
                </div>
            </div>
        </section>

        @include('_layouts._partials._back_to_home_link')
    </div>
@endsection
