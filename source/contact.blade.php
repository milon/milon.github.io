@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | Contact',
        'description' => "Contact with Nuruzzaman Milon",
    ])
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

        @include('_layouts._partials._newsletter')

        <p class="back-link">
            <a href="{{ $page->baseUrl }}">Back to Home</a>
        </p>
    </div>
@endsection
