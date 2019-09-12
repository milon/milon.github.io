<section id="paginator">
    @if ($previous = $pagination->previous)
        <a href="{{ $pagination->first }}"><i class="fas fa-angle-double-left"></i></a>
        <a href="{{ $previous }}"><i class="fas fa-angle-left"></i></a>
    @else
        <span><i class="fas fa-angle-double-left"></i></span>
        <span><i class="fas fa-angle-left"></i></span>
    @endif

    @foreach ($pagination->pages as $pageNumber => $path)
        <a href="{{ $path }}"
        class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
            {{ $pageNumber }}
        </a>
    @endforeach

    @if ($next = $pagination->next)
        <a href="{{ $next }}"><i class="fas fa-angle-right"></i></a>
        <a href="{{ $pagination->last }}"><i class="fas fa-angle-double-right"></i></a>
    @else
        <span><i class="fas fa-angle-right"></i></span>
        <span><i class="fas fa-angle-double-right"></i></span>
    @endif
</section>
