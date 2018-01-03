@extends('_layouts.master')

@section('body')
    <h2>{{ $page->title }}</h2>
    <p>{{ $page->formatedDate($page->date) }}</p>

    @yield('content')

    <p class="back-link">
        <a href="{{ $page->baseUrl }}">Go to Home</a>
    </p>
@endsection
