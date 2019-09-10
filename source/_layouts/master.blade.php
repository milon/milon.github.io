<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Nuruzzaman Milon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ $page->siteTitle }}</title>
        <link rel="shortcut icon" href="/images/favicon.png"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/reset.min.css">
        <link rel="stylesheet" href="/css/default.min.css">
        <link rel="stylesheet" href="/css/Font-Awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/main.css">

        @yield('meta')
    </head>
    <body>
        <section id="header">
            <h1>
                <a href="{{ $page->baseUrl }}">Nuruzzaman Milon</a>
            </h1>
            <h2 class="tagline">Programmer, Author, Tech Enthusiast</h2>
            <p>
                <a class="{{ $page->selected('/blogs') }}" href="/blogs">Blogs</a>
                <a class="{{ $page->selected('/laravel') }}" href="/laravel">Book</a>
                <a class="{{ $page->selected('/talks') }}" href="/talks">Talks</a>
                <a class="{{ $page->selected('/contact') }}" href="/contact">Contact</a>
                <a href="/resume">Resume</a>
            </p>
        </section>

        <section>
            @yield('body')
        </section>

        <section id="footer">
            <div class="social-links">
                <a href="{{ $page->social->github }}" title="Github"><i class="fa fa-github-alt"></i></a>
                <a href="{{ $page->social->twitter }}" title="Twitter"><i class="fa fa-twitter-square"></i></a>
                <a href="{{ $page->social->facebook }}" title="Facebook"><i class="fa fa-facebook-official"></i></a>
                <a href="{{ $page->social->linkedin }}" title="LinkedIn"><i class="fa fa-linkedin-square"></i></a>
                <a href="{{ $page->social->slideshare }}" title="SlideShare"><i class="fa fa-slideshare"></i></a>
                <a href="{{ $page->social->speakerdeck }}" title="Speakerdeck"><i class="fa fa-link"></i></a>
                <a href="{{ $page->social->instagram }}" title="Instagram"><i class="fa fa-instagram"></i></a>
                <a href="{{ $page->social->stackoverflow }}" title="StackOverflow"><i class="fa fa-stack-overflow"></i></a>
            </div>
        </section>

        @if ($page->production)
            @include('_layouts._analytics')
        @endif
    </body>
</html>
