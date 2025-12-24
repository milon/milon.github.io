@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._article_meta')
@endsection

@section('body')
    <div class="landing-page">
        <section class="intro-section">
            <h2>{{ $page->title }}</h2>
            <p>{{ $page->formatedDate($page->date) }}</p>
        </section>

        <section class="about-section">
            @yield('content')
        </section>

        <section class="current-section">
            @include('_layouts._partials._category_tags')
        </section>
    </div>

    <hr>

    @if($page->production)
        @include('_layouts._partials._disqus')
    @endif

    @include('_layouts._partials._back_to_home_link')

    @if($page->syntaxHighlight)
        @include('_layouts._partials._highlightjs')
    @endif
@endsection
