@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | About Me',
        'description' => "About Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="landing-page">
        <p></p>
    <p>
        <img src="/assets/images/family.jpg" alt="Avatar" class="profile-img">
        Hello, my name is Nuruzzaman Milon.
    </p>
    <p>I hail from Dhaka, Bangladesh, where I spent my early years, received my education at Shamsul Haque Khan High School and Dhaka College, and later pursued my Bachelor degree in Information and Communication Technology at Mawlana Bhashani Science and Technology University.</p>
    <p>I have a deep curiosity for a wide range of subjects, although formal education hasn't always been my strong suit. My passion lies in computers and technology, with a particular fondness for computer programming. Lately, I've developed a keen interest in cars.</p>
    <p>Spending time with my friends is something I cherish. In the past, I used to frequent <a href="https://www.facebook.com/koratkol">Koratkol University</a>, which I considered the ultimate hangout spot. Unfortunately, I can no longer do so since I relocated from Bangladesh.</p>
    <p>Currently, I'm employed as a Software Development Engineer II at <a href="https://amazon.com">Amazon</a>, based on Vancouver, British Columbia, Canada and residing in one of the suburbs of Vancouver. Additionally, I serve as an administrator for <a href="https://www.facebook.com/groups/pxperts">phpXperts</a>, Bangladesh's largest developer community.</p>
    <p>Lately, I've developed a newfound passion for cooking, and I'm excited to share my recipes <a href="https://recipes.milon.im">here</a>.</p>
    <p>I am blessed to be the parent of a handsome prince and a lovely princess, whose presence has brought immense joy into my life.</p>
    <p>I wear my <a href="https://en.wikipedia.org/wiki/Bangladesh">Bangladeshi 🇧🇩</a> identity with great pride.</p>
    <p class="license">Everything of this site is published under <a rel="license" href="http://creativecommons.org/licenses/by/2.0/"><i class="fab fa-creative-commons"></i> Creative Commons Attribution 2.0 Generic License</a>.</p>
    </div>
@endsection
