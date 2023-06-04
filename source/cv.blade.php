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
    <embed src="/assets/pdf/Nuruzzaman_Milon_cv.pdf" type="application/pdf" style="min-height:100vh;width:100%" />

    @if ($page->production)
        @include('_layouts._partials._analytics')
    @endif
</body>

</html>
