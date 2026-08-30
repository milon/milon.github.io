<div id="disqus_thread"></div>

<script>
    var disqus_config = function () {
        this.page.url = '{{ $page->getUrl() }}';
        this.page.identifier = '{{ $page->getFilename() }}';
    };

    (function() {
        var loaded = false;

        function loadDisqus() {
            if (loaded) return;
            loaded = true;

            var d = document, s = d.createElement('script');
            s.src = 'https://{{ $page->dusqusShortName }}.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);

            var count = d.createElement('script');
            count.id = 'dsq-count-scr';
            count.src = '//{{ $page->dusqusShortName }}.disqus.com/count.js';
            count.async = true;
            (d.head || d.body).appendChild(count);
        }

        var thread = document.getElementById('disqus_thread');
        if (thread && 'IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                if (!entries[0] || !entries[0].isIntersecting) return;
                observer.disconnect();
                loadDisqus();
            }, { rootMargin: '400px 0px' });
            observer.observe(thread);
        } else {
            loadDisqus();
        }
    })();
</script>

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
