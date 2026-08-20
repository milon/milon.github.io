---
pagination:
  collection: talks
  perPage: 7
---

@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'image' => 'talks',
        'title' => 'milon.im | Talks',
        'description' => "Conference talks of Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Speaking</p>
            <h1>Talks given at conferences and meetups</h1>
            <p class="sub">Slides and notes from sessions on Laravel, PHP, and building for production.</p>
        </div>

        <section class="section">
            <div class="section-label">Index</div>
            <div class="section-body is-wide">
                <div class="index-list">
                    @foreach ($pagination->items as $talk)
                        <a class="index-item" href="{{ $talk->getUrl() }}">
                            <span class="index-num">{{ str_pad(((int) $pagination->currentPage - 1) * 7 + $loop->iteration, 3, '0', STR_PAD_LEFT) }}</span>
                            <span>
                                <span class="index-title" style="view-transition-name: talk-{{ $talk->getFilename() }}">{{ $talk->title }}</span>
                                <span class="index-gist">{{ $talk->gist }}</span>
                            </span>
                            <span class="index-date">{{ $talk->formatedDate($talk->date) }}</span>
                        </a>
                    @endforeach
                </div>

                @include('_layouts._partials._pagination')
            </div>
        </section>
    </div>
@endsection
