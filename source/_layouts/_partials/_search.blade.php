<dialog id="search-dialog" class="search-dialog" aria-label="Search">
    <div class="search-panel">
        <div class="search-head">
            <span class="search-eyebrow">Search</span>
            <span class="search-hint"><kbd>Esc</kbd> to close</span>
        </div>

        <form class="search-form" role="search">
            <input
                type="search"
                id="search-input"
                class="search-input"
                placeholder="Writing, talks, books, categories…"
                aria-label="Search writing, talks, books, and categories"
                role="combobox"
                aria-expanded="false"
                aria-controls="search-results"
                aria-autocomplete="list"
                autocomplete="off"
                spellcheck="false"
            >
        </form>

        <div id="search-results" class="search-results" role="listbox" aria-label="Search results"></div>

        <p id="search-status" class="search-status">Type to search writing, talks, books, and categories.</p>
    </div>
</dialog>
