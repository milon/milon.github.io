---
pagination:
  collection: posts
  perPage: 7
---

@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | Blogs',
        'description' => "Personal website of Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div>
        <p class="blogs-rss">
            <a href="/rss" title="Subscribe to RSS feed"><i class="fas fa-rss" aria-hidden="true"></i> RSS feed</a>
        </p>
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

        @include('_layouts._partials._pagination')
    </div>
@endsection
