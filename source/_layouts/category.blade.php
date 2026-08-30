@extends('_layouts.master')

@section('title', $page->documentTitle('#' . $page->getFilename()))

@section('meta')
    @include('_layouts._partials._index_meta', [
        'image' => 'writing',
        'title' => '#' . $page->getFilename(),
        'description' => 'Posts tagged ' . $page->getFilename(),
    ])
@endsection

@section('body')
    @php
        $slug = $page->getFilename();
        $items = $posts->filter(function ($post) use ($slug) {
            return in_array($slug, $post->getCategories(), true);
        });
    @endphp
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Writing</p>
            <h1>#{{ $slug }}</h1>
            <p class="sub">{{ $items->count() }} {{ $items->count() === 1 ? 'post' : 'posts' }} tagged {{ $slug }}, oldest at the bottom.</p>
        </div>

        <section class="section">
            <div class="section-label">Index</div>
            <div class="section-body is-wide">
                <p class="list-utility"><a href="/posts">All writing →</a></p>

                <div class="index-list">
                    @foreach ($items as $post)
                        <a class="index-item" href="{{ $post->getUrl() }}">
                            <span class="index-num">{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</span>
                            <span>
                                <span class="index-title" style="view-transition-name: post-{{ $post->getFilename() }}">{{ $post->title }}</span>
                                <span class="index-gist">{{ $post->gist }}</span>
                            </span>
                            <span class="index-date">{{ $post->formatedDate($post->date) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        @include('_layouts._partials._back_to_home_link', [
            'href' => '/posts',
            'label' => 'Back to Writing',
        ])
    </div>
@endsection
