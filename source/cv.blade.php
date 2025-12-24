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
    <div id="pdf-container">
        <div id="loading">Loading PDF...</div>
        <div id="error" style="display: none;"></div>
    </div>

    <div id="controls">
        <button id="download-pdf">Download PDF</button>
    </div>

    <script>
        // Wait for DOM and PDF.js to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Path to the PDF file
            const pdfPath = '/assets/pdf/Nuruzzaman_Milon_cv.pdf';

            // Set up PDF.js - access the global pdfjsLib from the CDN
            const pdfjsLib = window.pdfjsLib;

            // Specify the location of the PDF.js worker
            if (pdfjsLib && pdfjsLib.GlobalWorkerOptions) {
                pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.7.107/pdf.worker.min.js';
            }

            // Get DOM elements
            const pdfContainer = document.getElementById('pdf-container');
            const downloadButton = document.getElementById('download-pdf');
            const loadingDiv = document.getElementById('loading');
            const errorDiv = document.getElementById('error');

            // Store PDF and pages for responsive re-rendering
            let pdfDoc = null;
            let pageData = []; // Store page objects for re-rendering

            // Function to show error
            function showError(message) {
                loadingDiv.style.display = 'none';
                errorDiv.style.display = 'block';
                errorDiv.textContent = 'Error: ' + message;
                errorDiv.style.color = '#d32f2f';
                errorDiv.style.padding = '20px';
                errorDiv.style.textAlign = 'center';
            }

            // Calculate responsive scale based on screen width
            function calculateScale() {
                const containerWidth = pdfContainer.offsetWidth || window.innerWidth;
                const padding = 40; // Total horizontal padding
                const availableWidth = containerWidth - padding;
                
                // Standard US Letter width is 612 points (8.5 inches)
                // For mobile, use full width; for desktop, cap at reasonable size
                const isMobile = window.innerWidth < 768;
                const maxWidth = isMobile ? availableWidth : Math.min(availableWidth, 800);
                
                // Calculate scale to fit width, with minimum scale for readability
                const scale = Math.max(0.8, maxWidth / 612);
                
                return Math.min(scale, 2.0); // Cap at 2.0 for quality
            }

            // Render a single page
            async function renderPage(page, pageNum, scale) {
                const viewport = page.getViewport({ scale: scale });
                
                // Find or create wrapper and canvas for this page
                let pageWrapper = pdfContainer.querySelector(`.pdf-page-wrapper[data-page="${pageNum}"]`);
                let canvas;
                
                if (!pageWrapper) {
                    pageWrapper = document.createElement('div');
                    pageWrapper.classList.add('pdf-page-wrapper');
                    pageWrapper.setAttribute('data-page', pageNum);
                    
                    canvas = document.createElement('canvas');
                    canvas.classList.add('pdf-page');
                    pageWrapper.appendChild(canvas);
                    pdfContainer.appendChild(pageWrapper);
                } else {
                    canvas = pageWrapper.querySelector('canvas');
                }
                
                const ctx = canvas.getContext('2d');
                
                // Set canvas dimensions (use device pixel ratio for crisp rendering)
                const dpr = window.devicePixelRatio || 1;
                const displayWidth = viewport.width;
                const displayHeight = viewport.height;
                
                canvas.width = displayWidth * dpr;
                canvas.height = displayHeight * dpr;
                canvas.style.width = displayWidth + 'px';
                canvas.style.height = displayHeight + 'px';
                
                // Scale context for high DPI displays
                ctx.scale(dpr, dpr);
                
                // Render the page
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                };
                
                await page.render(renderContext).promise;
                return canvas;
            }

            // Render all pages
            async function renderAllPages() {
                if (!pdfDoc) return;
                
                const scale = calculateScale();
                loadingDiv.style.display = 'none';
                
                // Clear existing page wrappers
                const existingWrappers = pdfContainer.querySelectorAll('.pdf-page-wrapper');
                existingWrappers.forEach(wrapper => wrapper.remove());
                
                // Render pages sequentially
                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    try {
                        const page = await pdfDoc.getPage(pageNum);
                        await renderPage(page, pageNum, scale);
                        console.log(`Page ${pageNum} rendered at scale ${scale.toFixed(2)}`);
                    } catch (error) {
                        console.error(`Error rendering page ${pageNum}:`, error);
                        showError(`Failed to render page ${pageNum}: ${error.message}`);
                    }
                }
            }

            // Debounce function for resize events
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Handle window resize and orientation change
            const handleResize = debounce(() => {
                if (pdfDoc) {
                    renderAllPages();
                }
            }, 250);

            window.addEventListener('resize', handleResize);
            window.addEventListener('orientationchange', () => {
                setTimeout(handleResize, 100); // Small delay for orientation change
            });

            // Check if PDF.js is loaded
            if (!pdfjsLib) {
                showError('PDF.js library failed to load. Please refresh the page.');
            } else {
                // Load the PDF
                pdfjsLib.getDocument(pdfPath).promise.then(pdf => {
                    pdfDoc = pdf;
                    console.log('PDF loaded, total pages:', pdf.numPages);
                    renderAllPages();
                }).catch(error => {
                    console.error('Error loading PDF:', error);
                    showError('Failed to load PDF. Please check if the file exists. ' + error.message);
                });
            }

            // Add functionality to the download button
            downloadButton.addEventListener('click', () => {
                const link = document.createElement('a');
                link.href = pdfPath;
                link.download = pdfPath.split('/').pop();
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        }); // End DOMContentLoaded
    </script>

    @if ($page->production)
        @include('_layouts._partials._analytics')
    @endif
</body>

</html>
