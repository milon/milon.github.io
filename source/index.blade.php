---
pagination:
  collection: posts
  perPage: 5
---

@extends('_layouts.master')

@section('body')
    <ul>
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

        <section id="paginator">
            @if ($previous = $pagination->previous)
                <a href="{{ $page->baseUrl }}{{ $pagination->first }}">❮❮</a>
                <a href="{{ $page->baseUrl }}{{ $previous }}">❮</a>
            @else
                <span>❮❮</span>
                <span>❮</span>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $page->baseUrl }}{{ $path }}"
                class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
                    {{ $pageNumber }}
                </a>
            @endforeach

            @if ($next = $pagination->next)
                <a href="{{ $page->baseUrl }}{{ $next }}">❯</a>
                <a href="{{ $page->baseUrl }}{{ $pagination->last }}">❯❯</a>
            @else
                <span>❯</span>
                <span>❯❯</span>
            @endif
        </section>
    </ul>
@endsection
