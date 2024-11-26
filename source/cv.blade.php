<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuruzzaman_Milon_cv</title>
    
    @include('_layouts._partials._cv_meta', [
            'title' => 'milon.im | CV',
            'description' => "Curriculum Vitae of Nuruzzaman Milon",
    ])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.min.js"></script>
    <link rel="stylesheet" href="{{ mix('css/cv.css', 'assets/build') }}">
</head>

<body lang="en">
    <div id="pdf-container"></div>
    <div id="controls">
        <button id="download-pdf">Download PDF</button>
    </div>

    <script>
        // Path to the PDF file
        const pdfPath = '/assets/pdf/Nuruzzaman_Milon_cv.pdf';

        // Set up PDF.js
        const pdfjsLib = window['pdfjs-dist/build/pdf'];

        // Specify the location of the PDF.js worker
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.worker.min.js';

        // Get the canvas element
        const pdfContainer = document.getElementById('pdf-container');
        const downloadButton = document.getElementById('download-pdf');
        
        // Load and render the PDF
        pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
            console.log('PDF loaded');

            // Loop through each page
            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                pdf.getPage(pageNum).then(page => {
                    const viewport = page.getViewport({ scale: 1.5 });

                    // Create a canvas for each page
                    const canvas = document.createElement('canvas');
                    canvas.classList.add('pdf-page');
                    const ctx = canvas.getContext('2d');
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    // Append the canvas to the container
                    pdfContainer.appendChild(canvas);

                    // Render the page
                    const renderContext = {
                        canvasContext: ctx,
                        viewport: viewport,
                    };
                    page.render(renderContext).promise.then(() => {
                        console.log(`Page ${pageNum} rendered`);
                    });
                }).catch(error => {
                    console.error(`Error loading page ${pageNum}:`, error);
                });
            }
        }).catch(error => {
            console.error('Error loading PDF:', error);
        });

        // Add functionality to the download button
        downloadButton.addEventListener('click', () => {
            const link = document.createElement('a');
            link.href = pdfPath;
            link.download = pdfPath.split('/').pop();
            link.click();
        });
    </script>

    @if ($page->production)
        @include('_layouts._partials._analytics')
    @endif
</body>

</html>
