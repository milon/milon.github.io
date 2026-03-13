@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | Contact',
        'description' => "Contact with Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="contact-page">
        <h2>Contact Me</h2>

        <section class="contact-info">
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fa-solid fa-at"></i>
                </div>
                <div class="contact-details">
                    <strong>Email</strong>
                    <p>contact[at]milon[dot]im</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <div class="contact-details">
                    <strong>Website</strong>
                    <p><a href="https://milon.im">https://milon.im</a></p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fab fa-x-twitter"></i>
                </div>
                <div class="contact-details">
                    <strong>Twitter</strong>
                    <p>Want a quick response? Tweet me <a href="/twitter">@to_milon</a>!</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fab fa-linkedin"></i>
                </div>
                <div class="contact-details">
                    <strong>LinkedIn</strong>
                    <p>Connect on <a href="/linkedin">LinkedIn</a></p>
                </div>
            </div>
        </section>

        <section class="contact-social">
            <h3>Elsewhere</h3>
            <ul class="elsewhere-list">
                <li><a href="/github"><i class="fab fa-github" aria-hidden="true"></i> GitHub</a></li>
                <li><a href="/facebook"><i class="fab fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>
                <li><a href="/slideshare"><i class="fab fa-slideshare" aria-hidden="true"></i> SlideShare</a></li>
                <li><a href="/speakerdeck"><i class="fab fa-speaker-deck" aria-hidden="true"></i> Speakerdeck</a></li>
                <li><a href="/instagram"><i class="fab fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                <li><a href="/stackoverflow"><i class="fab fa-stack-overflow" aria-hidden="true"></i> Stack Overflow</a></li>
            </ul>
        </section>

        <section class="contact-newsletter">
            <div class="newsletter-section">
                <div class="newsletter-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="newsletter-content">
                    <p class="newsletter-intro">Want to know about my thoughts and what's going on? Subscribe to the newsletter below, no spam guaranteed.</p>
                    @include('_layouts._partials._newsletter')
                </div>
            </div>
        </section>

        @include('_layouts._partials._back_to_home_link')
    </div>
@endsection
