<div class="newsletter">
    <h2>Newsletter</h2>
    <form action="{{ $page->newsletterUrl }}" method="post" target="popupwindow" onsubmit="window.open('{{ $page->newsletterUrl }}', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true">
        <p>
            <input class="email" type="text" name="email" id="tlemail" placeholder="Enter your email address" />
            <input type="hidden" value="1" name="embed"/>
            <button type="submit" class="submit-btn">Subscribe</button>
        </p>
    </form>
</div>
