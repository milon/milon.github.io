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
                    <h3>Laravel After Deploy</h3>
                    <p class="book-subtitle">Architecture, Performance, and Operations at Scale</p>
                    <p>Shipping is the easy part. The hard part starts after deploy: when a flash sale or a viral post turns usual traffic into a spike, when bots hammer your login endpoint, when a dependency you don’t control has a bad afternoon, when the same webhook arrives twice, when the on-call phone rings at 3 a.m. and the answer isn’t in the framework docs. This book is about that layer — the decisions that keep a real system fast, correct, and operable once it’s already in production. The examples are Laravel and PHP by design; the problems are not Laravel-only.</p>
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
