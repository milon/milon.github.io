<entry>
    <id>{{ $entry->getUrl() }}</id>
    <link type="text/html" rel="alternate" href="{{ $entry->getUrl() }}" />
    <title>{{ $entry->title }}</title>
    <published>{{ date(DATE_ATOM, strtotime($entry->date)) }}</published>
    <updated>{{ date(DATE_ATOM, strtotime($entry->date)) }}</updated>
    <author>
        <name>{{ $entry->author ?? $page->siteAuthor }}</name>
    </author>
    <summary type="html">{{ $entry->gist }}</summary>
</entry>
