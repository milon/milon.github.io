---
pagination:
  collection: posts
  perPage: 10
---

@extends('_layouts.master')

@section('meta')
    @if ($page->production)
        <meta property="og:url" content="{{ $page->getUrl() }}" />
        <meta property="og:type" content="Article" />
        <meta property="og:title" content="milon.im" />
        <meta property="og:description" content="Personal website of Nuruzzaman Milon" />
        <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
        <meta property="fb:app_id" content="264496574269710" />
    @endif
@endsection

@section('body')
    <div>
        @foreach ($pagination->items as $post)
            <section class="summary">
                <h2>
                    <a href="{{ $post->getUrl() }}">{{ $post->title }}</a>
                </h2>
                <time>{{ $post->formatedDate($post->date) }}</time>
                <article>
                    <p>{{ $post->gist }}</p>
                </article>
            </section>
        @endforeach

        @include('_layouts._pagination')
    </div>
@endsection
