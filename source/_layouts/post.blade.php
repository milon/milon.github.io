@extends('_layouts.master')

@section('content')
    <h1>{{ $page->title }}</h1>
    <p>{{ $page->date }}</p>

    @yield('content')

    <a href="{{ $page->baseUrl }}">Go to Home</a>
@endsection
