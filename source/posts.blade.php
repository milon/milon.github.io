---
title: Writing
pagination:
  collection: posts
  perPage: 7
---

@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'image' => 'writing',
        'description' => "Writing by Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Writing</p>
            <h1>Notes on code, systems, and everything around them</h1>
            <p class="sub">{{ $pagination->totalItems ?? count($posts) }} posts, oldest at the bottom. Also available as an <a href="/rss">RSS feed</a>.</p>
        </div>

        <section class="section">
            <div class="section-label">Index</div>
            <div class="section-body is-wide">
                <p class="list-utility"><a href="/rss" title="Subscribe to RSS feed">RSS feed →</a></p>

                <div class="index-list">
                    @foreach ($pagination->items as $post)
                        <a class="index-item" href="{{ $post->getUrl() }}">
                            <span class="index-num">{{ str_pad(((int) $pagination->currentPage - 1) * 7 + $loop->iteration, 3, '0', STR_PAD_LEFT) }}</span>
                            <span>
                                <span class="index-title" style="view-transition-name: post-{{ $post->getFilename() }}">{{ $post->title }}</span>
                                <span class="index-gist">{{ $post->gist }}</span>
                            </span>
                            <span class="index-date">{{ $post->formatedDate($post->date) }}</span>
                        </a>
                    @endforeach
                </div>

                @include('_layouts._partials._pagination')
            </div>
        </section>
    </div>
@endsection
