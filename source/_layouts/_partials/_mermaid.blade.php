<script src="https://cdnjs.cloudflare.com/ajax/libs/mermaid/11.15.0/mermaid.min.js"></script>

<script>
    (function() {
        var hosts = [];

        document.querySelectorAll('pre code.language-mermaid').forEach(function(code) {
            var pre = code.parentNode;
            var host = document.createElement('div');
            host.className = 'mermaid-wrap';
            host.setAttribute('data-source', code.textContent);
            pre.parentNode.replaceChild(host, pre);
            hosts.push(host);
        });

        if (!hosts.length) return;

        function cssVar(name) {
            return getComputedStyle(document.documentElement).getPropertyValue(name).trim();
        }

        function draw() {
            mermaid.initialize({
                startOnLoad: false,
                theme: 'base',
                securityLevel: 'strict',
                fontFamily: getComputedStyle(document.body).fontFamily,
                themeVariables: {
                    background: cssVar('--paper-2'),
                    primaryColor: cssVar('--paper-3'),
                    primaryTextColor: cssVar('--ink'),
                    primaryBorderColor: cssVar('--rule'),
                    lineColor: cssVar('--ink-3'),
                    secondaryColor: cssVar('--paper-2'),
                    tertiaryColor: cssVar('--paper'),
                    actorBkg: cssVar('--paper-3'),
                    actorBorder: cssVar('--rule'),
                    actorTextColor: cssVar('--ink'),
                    actorLineColor: cssVar('--ink-4'),
                    signalColor: cssVar('--ink-2'),
                    signalTextColor: cssVar('--ink'),
                    labelBoxBkgColor: cssVar('--paper-3'),
                    labelBoxBorderColor: cssVar('--rule'),
                    labelTextColor: cssVar('--ink'),
                    noteBkgColor: cssVar('--paper-3'),
                    noteTextColor: cssVar('--ink'),
                    noteBorderColor: cssVar('--rule'),
                    activationBkgColor: cssVar('--paper-3'),
                    activationBorderColor: cssVar('--ink-4')
                }
            });

            hosts.forEach(function(host) {
                host.innerHTML = '';
                var diagram = document.createElement('div');
                diagram.className = 'mermaid';
                diagram.textContent = host.getAttribute('data-source');
                host.appendChild(diagram);
            });

            mermaid.run({ querySelector: '.mermaid-wrap .mermaid' });
        }

        function boot() {
            draw();
            new MutationObserver(function(records) {
                for (var i = 0; i < records.length; i++) {
                    if (records[i].attributeName === 'data-theme') {
                        draw();
                        return;
                    }
                }
            }).observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['data-theme']
            });
        }

        // Theme toggle lives later in the layout. Wait until it has run so the
        // first paint uses the stored light/dark choice, not the default.
        if (document.readyState === 'complete') boot();
        else window.addEventListener('load', boot);
    })();
</script>
