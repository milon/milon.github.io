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
            <i class="fa-solid fa-at"></i> contact[at]milon[dot]im <br>
            <a href="https://milon.im"><i class="fas fa-globe-americas"></i> https://milon.im</a> <br>
        </p>
        <p>
            <i class="fa-solid fa-mobile-retro"></i> Shoot an email instead. <br>
            <i class="fab fa-x-twitter"></i> Want a quick response? Tweet me <a href="/twitter">@to_milon</a>! <br>
            <i class="fas fa-envelope-open-text"></i> Want to know about my thoughs and what going on? Subscribe to the newsletter below, no spam guaranteed.
        </p>

        @include('_layouts._partials._newsletter')

        @include('_layouts._partials._back_to_home_link')
    </div>
@endsection
