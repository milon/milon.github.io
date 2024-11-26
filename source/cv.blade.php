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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alice&display=swap');
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center; /* Vertically center */
            justify-content: center; /* Horizontally center */
            min-height: 100vh; /* Full viewport height */
            background-color: #f4f4f4; /* Optional: Nice background for contrast */
        }
        #pdf-container {
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center canvas horizontally */
        }
        .pdf-page {
            margin-bottom: 10px;
        }
        #controls {
            text-align: center;
            margin-bottom: 20px;
        }
        button {
            font-family: 'Alice';
            padding: 10px;
            font-size: 1em;
            border: 2px solid #C0C0C0;
            color: #050506;
            cursor: pointer;
        }
        button:hover {
            border: 2px solid #050506;
        }
    </style>
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
