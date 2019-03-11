@extends('_layouts.master')

@section('meta')
    @if ($page->production)
        <meta property="og:url" content="{{ $page->getUrl() }}" />
        <meta property="og:type" content="Article" />
        <meta property="og:title" content="milon.im" />
        <meta property="og:description" content="About Nuruzzaman Milon" />
        <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
        <meta property="fb:app_id" content="264496574269710" />
    @endif
@endsection

@section('body')
    <h2>About Me</h2>
    <p></p>

    <p>
        <img src="/images/about.jpg" alt="Avatar" class="avatar">
        Birth, childhood everything is in Dhaka, Bangladesh. Got education from Shamsul Haque Khan High School and Dhaka College. Then went to Mawlana Bhashani Science and Technology University to study Information and Communication Technology.
    </p>
    <p>I have interest in every single thing on the earth except formal education. Loved to be in touch with computer and technology. Had a weakness on computer programming. Recently very excited with cars.</p>
    <p>I love to hang out with my buddies. I regularly go to <a href="https://www.facebook.com/koratkol">Kortaltol University</a>, the best hangout place on earth.</p>
    <p>Currently, I am working for a German <a href="https://check24.de">company</a> as Senior Software Engineer and living in <a href="https://en.wikipedia.org/wiki/M%C3%BCnster">Münster</a>, in the <a href="https://en.wikipedia.org/wiki/North_Rhine-Westphalia">North Rhine-Westphalia</a> state of Germany. I am also an admin of <a href="https://www.facebook.com/groups/pxperts">phpXperts</a>, the largest developer community of Bangladesh.</p>
    <p>Recently I become a father of a beautiful prince.</p>
    <p>I am a proud <a href="https://en.wikipedia.org/wiki/Bangladesh">Bangladeshi</a>.</p>

    <p class="back-link">
        <a href="{{ $page->baseUrl }}">Back to Home</a>
    </p>
@endsection
