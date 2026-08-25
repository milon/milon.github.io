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
        <header class="topbar">
            <a class="wordmark" href="{{ $page->baseUrl }}">
                <span class="mark" aria-hidden="true"></span> Nuruzzaman Milon
            </a>
            <nav class="topbar-nav">
                <a data-num="01" class="{{ $page->selected('/') }}" href="/">Root</a>
                <a data-num="02" class="{{ (strpos($page->getPath(), '/posts') === 0 || strpos($page->getPath(), '/post/') === 0) ? 'selected' : '' }}" href="/posts">Writing</a>
                <a data-num="03" class="{{ ($page->getPath() === '/books' || strpos($page->getPath(), '/book/') === 0) ? 'selected' : '' }}" href="/books">Books</a>
                <a data-num="04" class="{{ ($page->getPath() === '/talks' || strpos($page->getPath(), '/talk/') === 0) ? 'selected' : '' }}" href="/talks">Talks</a>
                <a data-num="05" class="{{ $page->selected('/cv') }}" href="/cv">CV</a>
                <a data-num="06" class="{{ $page->selected('/contact') }}" href="/contact">Contact</a>
                <button type="button" class="theme-toggle" id="theme-toggle" title="Toggle light/dark theme" aria-label="Toggle light/dark theme">
                    <svg class="icon-moon" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/>
                    </svg>
                    <svg class="icon-sun" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="4"/>
                        <path d="M12 2v2m0 16v2M4.9 4.9l1.4 1.4m11.4 11.4 1.4 1.4M2 12h2m16 0h2M6.3 17.7l-1.4 1.4M19.1 4.9l-1.4 1.4"/>
                    </svg>
                </button>
            </nav>
        </header>

        <main id="body">
            @yield('body')
        </main>

        <footer id="footer">
            <div class="footer-inner">
                <span>© {{ date('Y') }} Nuruzzaman Milon · <a rel="license" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a></span>
                <span class="footer-links">
                    <a href="/github">GitHub</a>
                    <a href="/linkedin">LinkedIn</a>
                    <a href="/rss">RSS</a>
                    <a href="/contact">Newsletter</a>
                </span>
            </div>
        </footer>

        @if ($page->production)
            @include('_layouts._partials._analytics')
        @endif
        <script>
            (function() {
                var STORAGE_KEY = 'milon.im-theme';
                var html = document.documentElement;
                var btn = document.getElementById('theme-toggle');

                function setTheme(theme) {
                    html.setAttribute('data-theme', theme);
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
