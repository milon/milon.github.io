@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | About Me',
        'description' => "About Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <p></p>
    <p>
        <img src="/assets/images/about.jpg" alt="Avatar" class="profile-img">
        Hello, my name is Milon.
    </p>
    <p>Birth, childhood everything was in Dhaka, Bangladesh. Got education from Shamsul Haque Khan High School and Dhaka College. Then went to Mawlana Bhashani Science and Technology University to study Information and Communication Technology.</p>
    <p>I have interest in every single thing on the earth except formal education. Loved to be in touch with computer and technology. Had a weakness on computer programming. Recently very excited with cars.</p>
    <p>I love to hang out with my buddies. I used to go to <a href="https://www.facebook.com/koratkol">Koratkol University</a> regularly, the best hangout place on earth. Unfortunately, I can't do it any more because I moved out from Bangladesh.</p>
    <p>Currently, I am working for <a href="https://amazon.com/">Amazon</a> as Software Development Engineer II and living in Toronto, Ontario, Canada. I am also an admin of <a href="https://www.facebook.com/groups/pxperts">phpXperts</a>, the largest developer community of Bangladesh.</p>
    <p>Recently, I have a new hobby for cooking. I am sharing my recipes <a href="https://easy-recipes.netlify.app/">here</a>.</p>
    <p>I am the father of a beautiful prince and a princess.</p>
    <p>I am a proud <a href="https://en.wikipedia.org/wiki/Bangladesh">Bangladeshi 🇧🇩</a>.</p>
    <p class="license">Everything of this site is published under <a rel="license" href="http://creativecommons.org/licenses/by/2.0/"><i class="fab fa-creative-commons"></i> Creative Commons Attribution 2.0 Generic License</a>.</p>
@endsection
