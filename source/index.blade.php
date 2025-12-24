@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | About Me',
        'description' => "About Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="landing-page">
        <section class="intro-section">
            <div class="intro-content">
                <img src="/assets/images/family.jpg" alt="Avatar" class="profile-img">
                <div class="intro-text">
                    <h3>Hello, my name is Nuruzzaman Milon.</h3>
                    <p>I hail from Dhaka, Bangladesh, where I spent my early years, received my education at Shamsul Haque Khan High School and Dhaka College, and later pursued my Bachelor degree in Information and Communication Technology at Mawlana Bhashani Science and Technology University.</p>
                </div>
            </div>
        </section>

        <section class="about-section">
            <p>I have a deep curiosity for a wide range of subjects, although formal education hasn't always been my strong suit. My passion lies in computers and technology, with a particular fondness for computer programming. Lately, I've developed a keen interest in cars.</p>
            <p>Spending time with my friends is something I cherish. In the past, I used to frequent <a href="https://www.facebook.com/koratkol">Koratkol University</a>, which I considered the ultimate hangout spot. Unfortunately, I can no longer do so since I relocated from Bangladesh.</p>
        </section>

        <section class="current-section">
            <p>Currently, I am working as a Senior Software Development Engineer and living in a suburb of Vancouver, British Columbia, Canada. Additionally, I serve as an administrator for <a href="https://www.facebook.com/groups/pxperts">phpXperts</a>, Bangladesh's largest developer community.</p>
            <p>Lately, I've developed a newfound passion for cooking, and I'm excited to share my recipes <a href="https://recipes.milon.im">here</a>.</p>
        </section>

        <section class="personal-section">
            <p>I am blessed to be the parent of a handsome prince and two lovely princesses, whose presence has brought immense joy into my life.</p>
            <p>I wear my <a href="https://en.wikipedia.org/wiki/Bangladesh">Bangladeshi 🇧🇩</a> identity with great pride.</p>
        </section>

        <section class="license-section">
            <p class="license">Everything of this site is published under <a rel="license" href="http://creativecommons.org/licenses/by/2.0/"><i class="fab fa-creative-commons"></i> Creative Commons Attribution 2.0 Generic License</a>.</p>
        </section>
    </div>
@endsection
