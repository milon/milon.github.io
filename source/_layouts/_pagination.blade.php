<section id="paginator">
    @if ($previous = $pagination->previous)
        <a href="{{ $pagination->first }}">↞</a>
        <a href="{{ $previous }}">←</a>
    @else
        <span>↞</span>
        <span>←</span>
    @endif

    @foreach ($pagination->pages as $pageNumber => $path)
        <a href="{{ $path }}"
        class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
            {{ $pageNumber }}
        </a>
    @endforeach

    @if ($next = $pagination->next)
        <a href="{{ $next }}">→</a>
        <a href="{{ $pagination->last }}">↠</a>
    @else
        <span>→</span>
        <span>↠</span>
    @endif
</section>
