@php echo '<?xml version="1.0" encoding="UTF-8"?>' @endphp
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>{{ $page->siteName }}</title>
    <link href="{{ $page->baseUrl }}{{ $page->site_path }}" />
    <link type="application/atom+xml" rel="self" href="{{ $page->getUrl() }}" />
    <updated>{{ date(DATE_ATOM) }}</updated>
    <id>tag:{{ $page->siteTitle }},{{ date('Y')}}:{{ $page->getUrl() }}</id>
    <author>
        <name>{{ $page->siteAuthor }}</name>
    </author>
    @yield('content')
</feed>
