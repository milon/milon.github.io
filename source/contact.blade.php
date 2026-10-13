---
title: Contact
---

@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'image' => 'contact',
        'description' => "Contact Nuruzzaman Milon",
    ])
@endsection

@section('body')
    @php $contact = $page->contact; @endphp
    <div class="shell">
        <div class="page-head">
            <p class="eyebrow">Say hello</p>
            <h1>Get in touch</h1>
            <p class="sub">The fastest way to reach me is email. I read everything, and I reply to most of it.</p>
        </div>

        <section class="section">
            <h2 class="section-label">01 — Direct</h2>
            <div class="section-body is-wide">
                <div class="contact-list">
                    <div class="contact-row">
                        <span class="contact-key">Email</span>
                        <p class="contact-val"><a href="{{ $contact['emailMailto'] }}">{{ $contact['email'] }}</a></p>
                    </div>
                    <div class="contact-row">
                        <span class="contact-key">Website</span>
                        <p class="contact-val"><a href="{{ $contact['websiteUrl'] }}">{{ $contact['website'] }}</a></p>
                    </div>
                    <div class="contact-row">
                        <span class="contact-key">X</span>
                        <p class="contact-val">
                            <a href="{{ $contact['xPath'] }}">{{ $contact['xHandle'] }}</a>
                            <span class="note">Want a quick response? This is the place.</span>
                        </p>
                    </div>
                    <div class="contact-row">
                        <span class="contact-key">LinkedIn</span>
                        <p class="contact-val"><a href="{{ $contact['linkedinPath'] }}">{{ $contact['linkedinHandle'] }}</a></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-label">02 — Elsewhere</h2>
            <div class="section-body is-wide">
                <ul class="elsewhere">
                    @foreach ($contact['elsewhere'] as $link)
                        <li><a href="{{ $link['href'] }}">{{ $link['label'] }} <span class="ar" aria-hidden="true">↗</span></a></li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="section">
            <h2 class="section-label">03 — Newsletter</h2>
            <div class="section-body is-wide">
                @include('_layouts._partials._newsletter')
            </div>
        </section>
    </div>
@endsection
