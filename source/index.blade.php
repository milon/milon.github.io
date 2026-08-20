@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | About Me',
        'description' => "About Nuruzzaman Milon",
    ])
@endsection

@section('body')
    <div class="shell">
        <section class="hero">
            <p class="eyebrow">Vancouver, BC — Engineering Tech Lead</p>
            <h1>Building software that scales <em>to millions of users.</em></h1>
            <p class="lede">Programmer, author, and speaker. I lead the engineering behind production systems that serve millions, and I write about what it actually takes to keep them running.</p>
            <p class="hero-meta">
                <span><b>Now</b> — Engineering Tech Lead</span>
                <span><b>Author</b> — Laravel After Deploy</span>
                <span><b>Speaker</b> — Laravel, architecture, scale</span>
            </p>
        </section>

        <section class="section">
            <div class="section-label">01 — About</div>
            <div class="section-body">
                <p>I grew up in Dhaka, Bangladesh, and now live in a suburb of Vancouver, British Columbia, where I work as an Engineering Tech Lead. Most of my days are spent on systems that have to stay up for millions of people: architecture, performance, and the unglamorous work that happens after deploy.</p>
                <p>I write and speak about that work: what it actually takes to keep Laravel systems running once they leave a laptop.</p>
                <p>Outside of work I cook and publish the recipes <a href="https://recipes.milon.im">here</a>, and I have developed a late interest in cars. I am the parent of a son and two daughters. I wear my Bangladeshi identity with pride.</p>
            </div>
        </section>

        <section class="section">
            <div class="section-label">02 — Writing</div>
            <div class="section-body is-wide">
                <div class="index-list">
                    @foreach ($posts->take(5) as $post)
                        <a class="index-item is-compact" href="{{ $post->getUrl() }}">
                            <span class="index-title">{{ $post->title }}</span>
                            <span class="index-date">{{ $post->formatedDate($post->date) }}</span>
                        </a>
                    @endforeach
                </div>
                <p class="list-utility"><a href="/blogs">All writing →</a></p>
            </div>
        </section>

        <section class="section">
            <div class="section-label">03 — Books</div>
            <div class="section-body">
                <p>Two books on Laravel, written a decade apart, for two very different readers. <em>Laravel After Deploy</em> is a production playbook for mid-to-senior engineers. <em>Laravel PHP Web Framework</em> is a Bengali-language introduction, published by Dimik Prokashoni in two editions.</p>
                <p class="list-utility"><a href="/books">All books →</a></p>
            </div>
        </section>

        <section class="section">
            <div class="section-label">04 — Licence</div>
            <div class="section-body">
                <p>Everything on this site is published under the <a rel="license" href="http://creativecommons.org/licenses/by/2.0/">Creative Commons Attribution 2.0 Generic License</a>.</p>
            </div>
        </section>
    </div>
@endsection
