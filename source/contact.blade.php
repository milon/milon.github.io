@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | Contact',
        'description' => "Contact with Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Say hello</p>
            <h1>Get in touch</h1>
            <p class="sub">The fastest way to reach me is email. I read everything, and I reply to most of it.</p>
        </div>

        <section class="section">
            <div class="section-label">01 — Direct</div>
            <div class="section-body is-wide">
                <div class="contact-list">
                    <div class="contact-row">
                        <span class="contact-key">Email</span>
                        <p class="contact-val">contact[at]milon[dot]im</p>
                    </div>
                    <div class="contact-row">
                        <span class="contact-key">Website</span>
                        <p class="contact-val"><a href="https://milon.im">milon.im</a></p>
                    </div>
                    <div class="contact-row">
                        <span class="contact-key">Twitter</span>
                        <p class="contact-val">
                            <a href="/twitter">@to_milon</a>
                            <span class="note">Want a quick response? This is the place.</span>
                        </p>
                    </div>
                    <div class="contact-row">
                        <span class="contact-key">LinkedIn</span>
                        <p class="contact-val"><a href="/linkedin">in/tomilon</a></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-label">02 — Elsewhere</div>
            <div class="section-body is-wide">
                <ul class="elsewhere">
                    <li><a href="/github">GitHub <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="/facebook">Facebook <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="/slideshare">SlideShare <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="/speakerdeck">Speaker Deck <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="/instagram">Instagram <span class="ar" aria-hidden="true">↗</span></a></li>
                    <li><a href="/stackoverflow">Stack Overflow <span class="ar" aria-hidden="true">↗</span></a></li>
                </ul>
            </div>
        </section>

        <section class="section">
            <div class="section-label">03 — Newsletter</div>
            <div class="section-body is-wide">
                @include('_layouts._partials._newsletter')
            </div>
        </section>
    </div>
@endsection
