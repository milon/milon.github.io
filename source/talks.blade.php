---
pagination:
  collection: talks
  perPage: 5
---

@extends('_layouts.master')

@section('meta')
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:type" content="Article" />
    <meta property="og:title" content="milon.im" />
    <meta property="og:description" content="Conference talks of Nuruzzaman Milon" />
    <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
    <meta property="fb:app_id" content="264496574269710" />
@endsection

@section('body')
    <div>
        @foreach ($pagination->items as $talk)
            <section class="summary">
                <h2>
                    <a href="{{ $talk->getUrl() }}">{{ $talk->title }}</a>
                </h2>
                <time>{{ $talk->formatedDate($talk->date) }}</time>
                <article>
                    <p>{{ $talk->gist }}</p>
                </article>
            </section>
        @endforeach

        @include('_layouts._pagination')
    </div>
@endsection
