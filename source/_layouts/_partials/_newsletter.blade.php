<div class="newsletter">
    <h2>Occasional notes, no spam</h2>
    <p class="newsletter-intro">Want to know about my thoughts and what's going on? Subscribe below. One email when there's something worth sending, and nothing otherwise.</p>
    <form action="https://app.kit.com/forms/9731057/subscriptions" method="post" data-newsletter>
        <p>
            <input class="email" type="email" name="email_address" placeholder="you@example.com" required />
            <button type="submit" class="submit-btn">Subscribe</button>
        </p>
    </form>
    <p class="newsletter-msg" data-newsletter-msg role="status" aria-live="polite" hidden></p>
</div>

<script>
    (function() {
        // Without fetch the form still posts normally and lands on Kit's own success page.
        if (!window.fetch) return;

        document.querySelectorAll('[data-newsletter]').forEach(function(form) {
            var message = form.parentNode.querySelector('[data-newsletter-msg]');
            var button = form.querySelector('.submit-btn');
            var label = button.textContent;

            function show(text, state) {
                message.textContent = text;
                message.setAttribute('data-state', state);
                message.hidden = false;
            }

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                button.disabled = true;
                button.textContent = 'Subscribing';
                message.hidden = true;

                // Kit answers with JSON instead of a redirect when we ask for it, and allows
                // any origin. Sending url-encoded keeps this a simple request, so no preflight.
                fetch(form.action, {
                    method: 'POST',
                    headers: { 'Accept': 'application/json' },
                    body: new URLSearchParams(new FormData(form))
                }).then(function(response) {
                    return response.json();
                }).then(function(data) {
                    // Anything that is not an outright failure still sends a confirmation
                    // email — "quarantined" submissions included.
                    if (data.status === 'failed') {
                        var messages = (data.errors || {}).messages || [];
                        throw new Error(messages[0] || 'Something went wrong. Please try again.');
                    }

                    form.reset();
                    show('Almost there. Check your inbox to confirm the subscription.', 'ok');
                }).catch(function(error) {
                    show(
                        error instanceof TypeError
                            ? 'Could not reach the server. Please try again in a moment.'
                            : error.message,
                        'error'
                    );
                }).then(function() {
                    button.disabled = false;
                    button.textContent = label;
                });
            });
        });
    })();
</script>
