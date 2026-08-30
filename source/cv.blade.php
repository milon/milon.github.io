@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._cv_meta', [
        'title' => 'milon.im | CV',
        'description' => "Curriculum Vitae of Nuruzzaman Milon",
    ])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.min.js" defer></script>
    <link rel="stylesheet" href="{{ vite('source/_assets/sass/cv.scss') }}">
    <script type="module" src="{{ vite('source/_assets/js/cv.js') }}"></script>
@endsection

@section('body')
    <div class="shell-narrow">
        <div class="page-head">
            <p class="eyebrow">Document</p>
            <h1>Curriculum Vitae</h1>
            <p class="sub">Engineering Tech Lead · Vancouver, British Columbia.</p>
        </div>

        <div class="doc-viewer">
            <div id="controls" class="doc-toolbar">
                <div id="navigation-group" class="doc-nav">
                    <button id="prev-page" class="btn-ghost" disabled aria-label="Previous page">←</button>
                    <span id="page-info" class="doc-count"><span id="current-page">1</span> / <span id="total-pages">-</span></span>
                    <button id="next-page" class="btn-ghost" aria-label="Next page">→</button>
                </div>
                <button id="download-pdf" class="btn-ghost" title="Download PDF">↓ Download PDF</button>
            </div>

            <div id="pdf-container" class="doc-stage">
                <div id="loading">Loading document…</div>
                <div id="error" style="display: none;"></div>
            </div>
        </div>
    </div>
@endsection
