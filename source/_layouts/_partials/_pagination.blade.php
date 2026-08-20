<section id="paginator">
    @if ($previous = $pagination->previous)
        <a href="{{ $pagination->first }}" aria-label="First page">«</a>
        <a href="{{ $previous }}" aria-label="Previous page">‹</a>
    @else
        <span>«</span>
        <span>‹</span>
    @endif

    @if ($pagination->currentPage <= ceil($page->paginatationLinkNumber / 2))
        @foreach ($pagination->pages as $pageNumber => $path)
            @if($pageNumber <= $page->paginatationLinkNumber)
                <a href="{{ $path }}"
                class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
                    {{ $pageNumber }}
                </a>
            @endif
        @endforeach

        @if($pagination->totalPages > $page->paginatationLinkNumber)
            <span>…</span>
        @endif
    @elseif ($pagination->currentPage >= ($pagination->totalPages - floor($page->paginatationLinkNumber / 2)))
        @if($pagination->totalPages > $page->paginatationLinkNumber)
            <span>…</span>
        @endif
        @foreach ($pagination->pages as $pageNumber => $path)
            @if($pageNumber > ($pagination->totalPages - $page->paginatationLinkNumber))
                <a href="{{ $path }}"
                class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
                    {{ $pageNumber }}
                </a>
            @endif
        @endforeach
    @else
        @if($pagination->totalPages > $page->paginatationLinkNumber)
            <span>…</span>
        @endif
        @foreach ($pagination->pages as $pageNumber => $path)
            @if( $pageNumber >= ($pagination->currentPage - floor($page->paginatationLinkNumber / 2))
            && $pageNumber <= ($pagination->currentPage + floor($page->paginatationLinkNumber / 2)) )
                <a href="{{ $path }}"
                class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
                    {{ $pageNumber }}
                </a>
            @endif
        @endforeach
        @if($pagination->totalPages > $page->paginatationLinkNumber)
            <span>…</span>
        @endif
    @endif

    @if ($next = $pagination->next)
        <a href="{{ $next }}" aria-label="Next page">›</a>
        <a href="{{ $pagination->last }}" aria-label="Last page">»</a>
    @else
        <span>›</span>
        <span>»</span>
    @endif
</section>
