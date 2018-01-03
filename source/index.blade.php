---
pagination:
  collection: posts
  perPage: 5
---

@extends('_layouts.master')

@section('content')
    <ul>
        @foreach ($pagination->items as $post)
            <section class="summary">
                <h2>
                    <a href="{{ $post->getUrl() }}">{{ $post->title }}</a>
                </h2>
                <time>{{ $post->date }}</time>
                <article>
                    <p></p>
                </article>
            </section>
        @endforeach

        <section id="paginator">
            @if ($previous = $pagination->previous)
                <a id="previous" href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $page->baseUrl }}{{ $path }}"
                class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
                    {{ $pageNumber }}
                </a>
            @endforeach

            @if ($next = $pagination->next)
                <a id="next" href="{{ $page->baseUrl }}{{ $next }}">Next Page</a>
            @endif
        </section>
    </ul>
@endsection
