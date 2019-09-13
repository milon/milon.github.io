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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">

        @yield('meta')
    </head>
    <body>
        <section id="header">
            <a data-tooltip="RSS Feed" class="rss-feed" href="/rss"><i class="fas fa-rss"></i></a>
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
                <a href="{{ $page->social->github }}" title="Github"><i class="fab fa-github"></i></a>
                <a href="{{ $page->social->twitter }}" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="{{ $page->social->facebook }}" title="Facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="{{ $page->social->linkedin }}" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <a href="{{ $page->social->slideshare }}" title="SlideShare"><i class="fab fa-slideshare"></i></a>
                <a href="{{ $page->social->speakerdeck }}" title="Speakerdeck"><i class="fab fa-speaker-deck"></i></a>
                <a href="{{ $page->social->instagram }}" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="{{ $page->social->stackoverflow }}" title="StackOverflow"><i class="fab fa-stack-overflow"></i></a>
            </div>
        </section>

        @if ($page->production)
            @include('_layouts._analytics')
        @endif
    </body>
</html>
