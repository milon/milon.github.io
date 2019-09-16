@if(count($page->getCategories()))
    <p class="category-tags">
        @foreach ($page->getCategories() as $category)
            <span>#{{ $category }}</span>
        @endforeach
    </p>
@endif
