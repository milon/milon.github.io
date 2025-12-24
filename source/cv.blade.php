@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._cv_meta', [
        'title' => 'milon.im | CV',
        'description' => "Curriculum Vitae of Nuruzzaman Milon",
    ])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.min.js"></script>
    <link rel="stylesheet" href="{{ mix('css/cv.css', 'assets/build') }}">
    <script src="{{ mix('js/cv.js', 'assets/build') }}"></script>
@endsection

@section('body')
    <h2>Curriculum Vitae</h2>
    
    <div id="pdf-container">
        <div id="loading">Loading PDF...</div>
        <div id="error" style="display: none;"></div>
    </div>

    <div id="controls">
        <div id="navigation-group">
            <button id="prev-page" disabled><i class="fas fa-angle-left"></i></button>
            <span id="page-info"><span id="current-page">1</span>/<span id="total-pages">-</span></span>
            <button id="next-page"><i class="fas fa-angle-right"></i></button>
        </div>
        <button id="download-pdf" title="Download PDF"><i class="fas fa-download"></i></button>
    </div>
@endsection
