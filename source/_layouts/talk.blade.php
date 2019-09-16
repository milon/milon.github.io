@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._article_meta')
@endsection

@section('body')
    <h2>{{ $page->title }}</h2>
    <p>{{ $page->formatedDate($page->date) }}</p>

    @yield('content')

    <hr>

    @if($page->production)
        @include('_layouts._partials._disqus')
    @endif

    <p class="back-link">
        <a href="{{ $page->baseUrl.'talks' }}">Back to Talks</a>
    </p>

    @if($page->syntaxHighlight)
        @include('_layouts._partials._highlightjs')
    @endif
@endsection
