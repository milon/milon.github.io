@php
    $headline = $page->siteTitle . ($page->title ? ' | ' . $page->title : '');

    // A post can point at its own card with `ogImage:` in front matter;
    // otherwise it falls back to the card for its section.
    if ($page->ogImage) {
        $shareImage = str_starts_with($page->ogImage, 'http')
            ? $page->ogImage
            : $page->baseUrl . ltrim($page->ogImage, '/');
    } else {
        $shareImage = $page->baseUrl . 'assets/images/og/' . ($image ?? 'writing') . '.png';
    }
@endphp
@if ($page->production)
    {{-- open graph for facebook, google+, pinterest etc. --}}
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $headline }}" />
    <meta property="og:description" content="{{ $page->gist }}" />
    <meta property="og:image" content="{{ $shareImage }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="{{ $page->title }}" />
    <meta property="og:site_name" content="{{ $page->siteTitle }}" />
    <meta property="article:published_time" content="{{ date(DATE_ATOM, strtotime($page->date)) }}" />
    <meta property="article:author" content="{{ $page->siteAuthor }}" />
    <meta property="fb:app_id" content="264496574269710" />

    {{-- twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@to_milon" />
    <meta name="twitter:creator" content="@to_milon" />
    <meta name="twitter:title" content="{{ $headline }}">
    <meta name="twitter:description" content="{{ $page->gist }}">
    <meta name="twitter:image" content="{{ $shareImage }}" />
    <meta name="twitter:image:alt" content="{{ $page->title }}" />

    {{-- search engine --}}
    <meta name="description" content="{{ $page->gist }}">

    {{-- google --}}
    <meta itemprop="name" content="{{ $headline }}">
    <meta itemprop="description" content="{{ $page->description ?? $page->siteDescription }}">
    <meta itemprop="image" content="{{ $shareImage }}" />
@endif
