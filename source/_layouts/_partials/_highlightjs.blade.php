<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.2/highlight.min.js"></script>

{{-- Blade is not in the highlight.js bundle. This registers itself on load, so
     it has to come after highlight.min.js and before highlightAll(). The repo
     has no tags, hence the commit pin. --}}
<script src="https://cdn.jsdelivr.net/gh/miken32/highlightjs-blade@f36f88b/dist/blade.min.js"></script>

<script>
    // Only blocks that declared a language. Auto-detection guesses badly on things
    // like psql output, and colours it as whatever language it looks closest to.
    hljs.configure({ cssSelector: 'pre code[class*="language-"]:not(.language-mermaid)' });
    hljs.highlightAll();
</script>
