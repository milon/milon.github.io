@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._article_meta', ['image' => 'writing'])
@endsection

@section('body')
    <div class="shell-narrow">
        <div class="page-head">
            <p class="eyebrow">Writing</p>
            <h1 style="view-transition-name: post-{{ $page->getFilename() }}">{{ $page->title }}</h1>
            <p class="article-meta">
                <span>{{ $page->formatedDate($page->date) }}</span>
            </p>
        </div>

        <article class="prose">
            @yield('content')

            @include('_layouts._partials._category_tags')
        </article>

        @if($page->production)
            @include('_layouts._partials._disqus')
        @endif

        @include('_layouts._partials._back_to_home_link', [
            'href' => '/posts',
            'label' => 'Back to Writing',
        ])
    </div>

    @if($page->syntaxHighlight)
        @include('_layouts._partials._highlightjs')
    @endif
@endsection
