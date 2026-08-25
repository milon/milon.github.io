import Fuse from 'fuse.js';

const INDEX_URL = '/index.json';
const MAX_RESULTS = 8;
const DEBOUNCE_MS = 120;
const HINT = 'Type to search writing, talks, and books.';

const TYPE_LABELS = {
    post: 'Writing',
    talk: 'Talk',
    book: 'Book',
};

// ignoreLocation matters: Fuse otherwise penalises matches late in a string,
// which is wrong for a gist.
const FUSE_OPTIONS = {
    includeScore: true,
    ignoreLocation: true,
    threshold: 0.32,
    minMatchCharLength: 2,
    keys: [
        { name: 'title', weight: 0.55 },
        { name: 'gist', weight: 0.25 },
        { name: 'isbn', weight: 0.15 },
        { name: 'categories', weight: 0.05 },
    ],
};

document.addEventListener('DOMContentLoaded', function () {
    const dialog = document.getElementById('search-dialog');
    const trigger = document.getElementById('search-trigger');
    const form = document.querySelector('.search-form');
    const input = document.getElementById('search-input');
    const list = document.getElementById('search-results');
    const status = document.getElementById('search-status');

    if (!dialog || !trigger || !form || !input || !list || !status) return;

    // Without <dialog> support there is no overlay to open, so don't offer one.
    if (typeof dialog.showModal !== 'function') {
        trigger.hidden = true;
        return;
    }

    let fuse = null;
    let pending = null;
    let results = [];
    let active = -1;
    let debounce = null;

    function setStatus(text) {
        status.textContent = text;
        status.hidden = text === '';
    }

    // The index is only worth fetching once someone actually searches.
    function loadIndex() {
        if (fuse || pending) return pending || Promise.resolve();

        pending = fetch(INDEX_URL)
            .then(function (response) {
                if (!response.ok) throw new Error('HTTP ' + response.status);
                return response.json();
            })
            .then(function (data) {
                fuse = new Fuse(data, FUSE_OPTIONS);
                pending = null;
            })
            .catch(function () {
                // Leave fuse null and allow a later open to retry.
                pending = null;
                setStatus('Search is unavailable.');
            });

        return pending;
    }

    function clearActive() {
        const current = list.children[active];
        if (current) current.setAttribute('aria-selected', 'false');
        active = -1;
        input.removeAttribute('aria-activedescendant');
    }

    function setActive(index) {
        const options = list.children;
        if (!options.length) return;

        clearActive();

        active = (index + options.length) % options.length;

        const option = options[active];
        option.setAttribute('aria-selected', 'true');
        input.setAttribute('aria-activedescendant', option.id);
        option.scrollIntoView({ block: 'nearest' });
    }

    function buildOption(item, index) {
        const option = document.createElement('a');
        option.className = 'search-item';
        option.id = 'search-option-' + index;
        option.href = item.link;
        option.setAttribute('role', 'option');
        option.setAttribute('aria-selected', 'false');

        if (/^https?:/i.test(item.link)) option.rel = 'noopener';

        const title = document.createElement('span');
        title.className = 'search-item-title';
        title.textContent = item.title;
        option.appendChild(title);

        if (item.gist) {
            const gist = document.createElement('span');
            gist.className = 'search-item-gist';
            gist.textContent = item.gist;
            option.appendChild(gist);
        }

        const meta = document.createElement('span');
        meta.className = 'search-item-meta';
        meta.textContent = [TYPE_LABELS[item.type] || item.type, item.dateLabel]
            .filter(Boolean)
            .join(' · ');
        option.appendChild(meta);

        option.addEventListener('mousemove', function () {
            if (active !== index) setActive(index);
        });

        return option;
    }

    function render() {
        const query = input.value.trim();

        clearActive();
        list.replaceChildren();
        input.setAttribute('aria-expanded', 'false');

        if (query === '') {
            results = [];
            setStatus(HINT);
            return;
        }

        if (!fuse) {
            results = [];
            setStatus('Search is unavailable.');
            return;
        }

        results = fuse.search(query).slice(0, MAX_RESULTS).map(function (hit) {
            return hit.item;
        });

        if (!results.length) {
            setStatus('No matches.');
            return;
        }

        setStatus('');
        results.forEach(function (item, index) {
            list.appendChild(buildOption(item, index));
        });
        input.setAttribute('aria-expanded', 'true');
    }

    function open() {
        if (dialog.open) return;
        dialog.showModal();
        input.focus();
        loadIndex().then(function () {
            if (input.value.trim() !== '') render();
        });
    }

    trigger.addEventListener('click', open);

    document.addEventListener('keydown', function (event) {
        if (event.key !== '/' || event.metaKey || event.ctrlKey || event.altKey) return;
        if (dialog.open) return;

        const target = event.target;
        if (target instanceof Element && target.closest('input, textarea, select, [contenteditable]')) return;

        event.preventDefault();
        open();
    });

    // Clicks land on the dialog itself only when they miss the panel.
    dialog.addEventListener('click', function (event) {
        if (event.target === dialog) dialog.close();
    });

    dialog.addEventListener('close', function () {
        input.value = '';
        list.replaceChildren();
        clearActive();
        input.setAttribute('aria-expanded', 'false');
        setStatus(HINT);
        trigger.focus();
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const option = list.children[active] || list.children[0];
        if (option) option.click();
    });

    input.addEventListener('input', function () {
        window.clearTimeout(debounce);
        debounce = window.setTimeout(render, DEBOUNCE_MS);
    });

    input.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowDown') {
            event.preventDefault();
            setActive(active + 1);
        } else if (event.key === 'ArrowUp') {
            event.preventDefault();
            setActive(active === -1 ? -1 : active - 1);
        }
    });

    setStatus(HINT);
});
