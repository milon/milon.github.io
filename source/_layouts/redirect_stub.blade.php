<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="/assets/images/logo-mark.svg" type="image/svg+xml">
        <link rel="shortcut icon" href="/assets/images/favicon.png">
        <meta name="robots" content="noindex">
        <meta http-equiv="Refresh" content="0; url={{ $url }}">
    </head>

    <body>
        <p>If you aren't automatically redirected please follow <a href="{{ $url }}">this link</a>.</p>
        <script>
            // javaScript fallback if browser does not support/allow http-equiv="Refresh"
            window.location.replace("{{ $url }}");
        </script>
    </body>
</html>
