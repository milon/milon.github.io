@extends('_layouts.master')

@section('meta')
    @if ($page->production)
        <meta property="og:url" content="{{ $page->getUrl() }}" />
        <meta property="og:type" content="Article" />
        <meta property="og:title" content="milon.im" />
        <meta property="og:description" content="Contact with Nuruzzaman Milon" />
        <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
        <meta property="fb:app_id" content="264496574269710" />
    @endif
@endsection

@section('body')
    <h2>Contact Me</h2>

    <div class="contact">
        <p></p>
        <p>
            <i class="far fa-envelope"></i> contact[at]milon[dot]im <br>
            <a href="https://milon.im"><i class="fas fa-globe-americas"></i> https://milon.im</a> <br>
        </p>
        <p>
            <i class="fas fa-phone"></i> Shoot an email instead. <br>
            <i class="fab fa-twitter"></i> Want a quick response? Tweet me <a href="{{ $page->social->twitter }}">@to_milon</a>! <br>
            <i class="fas fa-envelope-open-text"></i> Want to know about my thoughs and what going on? Subscribe to the newsletter below, no spam guaranteed.
        </p>

        @include('_layouts._newsletter')

        <p class="back-link">
            <a href="{{ $page->baseUrl }}">Back to Home</a>
        </p>
    </div>
@endsection
