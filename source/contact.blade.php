@extends('_layouts.master')

@section('body')
    <h2>Contact Me</h2>

    <div class="contact">
        <p></p>
        <p>
            <i class="fa fa-envelope"></i> contact[at]milon[dot]im <br>
            <a href="https://milon.im"><i class="fa fa-globe"></i> https://milon.im</a> <br>
        </p>
        <p>
            <i class="fa fa-phone"></i> Shoot an email instead.
        </p>

        <p class="back-link">
            <a href="{{ $page->baseUrl }}">Back to Home</a>
        </p>
    </div>
@endsection
