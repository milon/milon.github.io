@if(count($page->getCategories()))
    <p class="category-tags">
        @foreach ($page->getCategories() as $category)
            <a href="{{ $page->categoryPath($category) }}">#{{ $category }}</a>
        @endforeach
    </p>
@endif
