@extends('_layouts.master')

@section('body')
    <h2>{{ $page->title }}</h2>
    <p>{{ $page->formatedDate($page->date) }}</p>

    @yield('content')

    <hr>
    <p class="back-link">
        Want to reply? Use my twitter (<a href="{{ $page->social->twitter }}">@to_milon</a>) handle. <br>
        <a href="{{ $page->base() }}">Go to Home</a>
    </p>

    @include('_layouts._highlightjs')
@endsection
