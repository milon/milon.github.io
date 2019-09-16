@extends('_layouts.rss')

@section('content')
    @foreach ($posts->take(25) as $entry)
        @include('_layouts._partials._post_as_rss_entry')
    @endforeach
@endsection
