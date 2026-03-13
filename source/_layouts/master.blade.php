<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Nuruzzaman Milon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ $page->siteTitle }}</title>
        <link rel="shortcut icon" href="/assets/images/favicon.png"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/sass/main.scss') }}">

        @yield('meta')
    </head>
    <body>
        <section id="header">
            <div class="header-icons">
                <button type="button" class="theme-toggle" id="theme-toggle" title="Toggle light/dark theme" aria-label="Toggle light/dark theme">
                    <i class="far fa-moon" aria-hidden="true"></i>
                </button>
            </div>
            <h1>
                <a href="{{ $page->baseUrl }}">
                    <img class="header-logo" src="/assets/images/logo.svg" alt="Nuruzzaman Milon">
                </a>
            </h1>
            <h2 class="tagline">Programmer, Author, Tech Enthusiast</h2>
            <p>
                <a class="{{ $page->selected('/') }}" href="/">Home</a>
                <a class="{{ ($page->getPath() === '/blogs' || strpos($page->getPath(), '/post/') === 0) ? 'selected' : '' }}" href="/blogs">Blogs</a>
                <a class="{{ $page->selected('/laravel') }}" href="/laravel">Book</a>
                <a class="{{ ($page->getPath() === '/talks' || strpos($page->getPath(), '/talk/') === 0) ? 'selected' : '' }}" href="/talks">Talks</a>
                <a class="{{ $page->selected('/contact') }}" href="/contact">Contact</a>
                <a class="{{ $page->selected('/cv') }}" href="/cv">CV</a>
            </p>
        </section>

        <section id="body">
            @yield('body')
        </section>

        <footer id="footer">
            <p class="footer-credit">© {{ date('Y') }} <a href="{{ $page->baseUrl }}">Nuruzzaman Milon</a></p>
        </footer>

        @if ($page->production)
            @include('_layouts._partials._analytics')
        @endif
        <script>
            (function() {
                var STORAGE_KEY = 'milon.im-theme';
                var html = document.documentElement;
                var btn = document.getElementById('theme-toggle');
                var icon = btn ? btn.querySelector('i') : null;

                function setTheme(theme) {
                    html.setAttribute('data-theme', theme);
                    if (icon) {
                        icon.className = theme === 'dark' ? 'far fa-sun' : 'far fa-moon';
                    }
                    try { localStorage.setItem(STORAGE_KEY, theme); } catch (e) {}
                }

                function getTheme() {
                    try {
                        var saved = localStorage.getItem(STORAGE_KEY);
                        if (saved === 'dark' || saved === 'light') return saved;
                    } catch (e) {}
                    return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                }

                setTheme(getTheme());

                if (btn) btn.addEventListener('click', function() {
                    setTheme(html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
                });
            })();
        </script>
    </body>
</html>
