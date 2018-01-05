---
pagination:
  collection: posts
  perPage: 5
---

@extends('_layouts.master')

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
