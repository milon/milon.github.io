---
pagination:
  collection: posts
  perPage: 10
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
