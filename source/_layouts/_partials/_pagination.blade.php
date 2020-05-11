<section id="paginator">
    @if ($previous = $pagination->previous)
        <a href="{{ $pagination->first }}"><i class="fas fa-angle-double-left"></i></a>
        <a href="{{ $previous }}"><i class="fas fa-angle-left"></i></a>
    @else
        <span><i class="fas fa-angle-double-left"></i></span>
        <span><i class="fas fa-angle-left"></i></span>
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
            <span>...</span>
        @endif
    @elseif ($pagination->currentPage >= ($pagination->totalPages - floor($page->paginatationLinkNumber / 2)))
        @if($pagination->totalPages > $page->paginatationLinkNumber)
            <span>...</span>
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
            <span>...</span>
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
            <span>...</span>
        @endif
    @endif

    @if ($next = $pagination->next)
        <a href="{{ $next }}"><i class="fas fa-angle-right"></i></a>
        <a href="{{ $pagination->last }}"><i class="fas fa-angle-double-right"></i></a>
    @else
        <span><i class="fas fa-angle-right"></i></span>
        <span><i class="fas fa-angle-double-right"></i></span>
    @endif
</section>
