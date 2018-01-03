<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Nuruzzaman Milon</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/reset.min.css">
        <link rel="stylesheet" href="/css/default.min.css">
        <link rel="stylesheet" href="/css/Font-Awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <section id="header">
            <h1>
                <a href="{{ $page->baseUrl }}">Nuruzzaman Milon</a>
            </h1>
            <h2>Programmer, Auther, Tech Enthusiast</h2>
            
        </section>

        <section>
            @yield('body')
        </section>

        <section id="footer">
            <div class="social-links">
                <a href="{{ $page->social->github }}"><i class="fa fa-github-alt"></i></a>
                <a href="{{ $page->social->twitter }}"><i class="fa fa-twitter-square"></i></a>
                <a href="{{ $page->social->facebook }}"><i class="fa fa-facebook-official"></i></a>
                <a href="{{ $page->social->linkedin }}"><i class="fa fa-linkedin-square"></i></a>
                <a href="{{ $page->social->slideshare }}"><i class="fa fa-slideshare"></i></a>
                <a href="{{ $page->social->speakerdeck }}"><i class="fa fa-link"></i></a>
                <a href="{{ $page->social->instagram }}"><i class="fa fa-instagram"></i></a>
                <a href="{{ $page->social->stackoverflow }}"><i class="fa fa-stack-overflow"></i></a>
            </div>
        </section>
    </body>
</html>
