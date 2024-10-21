<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="/assets/images/favicon.png"/>

        
        <meta name="robots" content="noindex">
        
        <meta http-equiv="Refresh" content="0; url=<?php echo e($url); ?>">
    </head>

    <body>
        <p>If you aren't automatically redirected please follow <a href="<?php echo e($url); ?>">this link</a>.</p>
        <script>
            // javaScript fallback if browser does not support/allow http-equiv="Refresh"
            window.location.replace("<?php echo e($url); ?>");
        </script>
    </body>
</html>
<?php /**PATH /Users/nmilon/Code/resume/vendor/milon/jigsaw-url-shortener/src/stubs/redirect.blade.php ENDPATH**/ ?>