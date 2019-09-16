@if ($page->production)
    {{-- open graph for facebook, google+, pinterest etc. --}}
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:type" content="Article" />
    <meta property="og:title" content="{{ $page->siteTitle }}{{ $page->title ? ' | ' . $page->title : '' }}" />
    <meta property="og:description" content="{{ $page->gist }}" />
    <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
    <meta property="fb:app_id" content="264496574269710" />

    {{-- twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $page->siteTitle }}{{ $page->title ? ' | ' . $page->title : '' }}">
    <meta name="twitter:description" content="{{ $page->gist }}">

    {{-- search engine --}}
    <meta name="description" content="{{ $page->gist }}">

    {{-- google --}}
    <meta itemprop="name" content="{{ $page->siteTitle }}{{ $page->title ? ' | ' . $page->title : '' }}">
    <meta itemprop="description" content="{{ $page->description ?? $page->siteDescription }}">
@endif
