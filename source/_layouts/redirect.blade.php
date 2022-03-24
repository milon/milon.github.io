<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="/assets/images/favicon.png"/>

        {{-- tell search engine not to index --}}
        <meta name="robots" content="noindex">
        {{-- redirect to new url --}}
        <meta http-equiv="Refresh" content="0; url={{ $page->url }}">
    </head>

    <body>
        <p>If you aren't automatically redirected please follow <a href="{{ $page->url }}">this link</a>.</p>
        <script>
            // javaScript fallback if browser does not support/allow http-equiv="Refresh"
            window.location.replace("{{ $page->url }}");
        </script>
    </body>
</html>
