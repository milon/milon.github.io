@extends('_layouts.master')

@section('meta')
    @include('_layouts._article_meta')
@endsection

@section('body')
    <h2>{{ $page->title }}</h2>
    <p>{{ $page->formatedDate($page->date) }}</p>

    @yield('content')

    @include('_layouts._category_tags')

    <hr>

    @if($page->production)
        @include('_layouts._disqus')
    @endif

    <p class="back-link">
        <a href="{{ $page->baseUrl }}">Back to Home</a>
    </p>

    @if($page->syntaxHighlight)
        @include('_layouts._highlightjs')
    @endif
@endsection
