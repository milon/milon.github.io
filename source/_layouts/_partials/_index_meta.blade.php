@if ($page->production)
    {{-- open graph for facebook, google+, pinterest etc. --}}
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:type" content="Article" />
    <meta property="og:title" content="{{ $title ?? $page->siteTitle }}" />
    <meta property="og:description" content="{{ $description ?? "" }}" />
    <meta property="og:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />
    <meta property="fb:app_id" content="264496574269710" />

    {{-- twitter --}}
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@to_milon" />
    <meta name="twitter:title" content="{{ $title ?? $page->siteTitle }}" />
    <meta name="twitter:description" content="{{ $description ?? "" }}" />
    <meta name="twitter:image" content="{{ $page->baseUrl.'images/qr-code.png' }}" />

    {{-- search engine --}}
    <meta name="description" content="{{ $description ?? "" }}" />

    {{-- google --}}
    <meta itemprop="name" content="{{ $title ?? $page->siteTitle }}" />
    <meta itemprop="description" content="{{ $description ?? "" }}" />
@endif
