@if ($page->production)
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:type" content="Article" />
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:description" content="{{ $page->gist }}" />
    <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
    <meta property="fb:app_id" content="264496574269710" />
@endif
