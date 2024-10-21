<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Nuruzzaman_Milon_cv</title>
    
    @include('_layouts._partials._cv_meta', [
            'title' => 'milon.im | CV',
            'description' => "Curriculum Vitae of Nuruzzaman Milon",
    ])
</head>

<body lang="en">
    <object data="/assets/pdf/Nuruzzaman_Milon_cv.pdf" type="application/pdf" style="min-height:100vh;width:100%" >
        <p>Oops! Your browser doesn't support PDFs!</p>
        <p><a href="/assets/pdf/Nuruzzaman_Milon_cv.pdf" download="">Download Instead</a></p>
    </object>

    @if ($page->production)
        @include('_layouts._partials._analytics')
    @endif
</body>

</html>
