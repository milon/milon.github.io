@php
    $headline = $page->documentTitle($title ?? null);
    $description = $description ?? $page->metaDescription();
    $shareImage = $page->baseUrl . 'assets/images/og/' . ($image ?? 'default') . '.png';
@endphp
@if ($page->production)
    {{-- open graph for facebook, google+, pinterest etc. --}}
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $headline }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="{{ $shareImage }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="{{ $headline }}" />
    <meta property="og:site_name" content="{{ $page->siteTitle }}" />
    <meta property="fb:app_id" content="264496574269710" />

    {{-- twitter --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@to_milon" />
    <meta name="twitter:creator" content="@to_milon" />
    <meta name="twitter:title" content="{{ $headline }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="{{ $shareImage }}" />
    <meta name="twitter:image:alt" content="{{ $headline }}" />

    {{-- search engine --}}
    <meta name="description" content="{{ $description }}" />

    {{-- google --}}
    <meta itemprop="name" content="{{ $headline }}" />
    <meta itemprop="description" content="{{ $description }}" />
    <meta itemprop="image" content="{{ $shareImage }}" />
@endif
