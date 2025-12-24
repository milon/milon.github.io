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
    const prevButton = document.getElementById('prev-page');
    const nextButton = document.getElementById('next-page');
    const currentPageSpan = document.getElementById('current-page');
    const totalPagesSpan = document.getElementById('total-pages');

    // Store PDF and current page state
    let pdfDoc = null;
    let currentPage = 1;
    let totalPages = 0;
    let renderedPages = new Map(); // Cache rendered pages

    // Function to show error
    function showError(message) {
        loadingDiv.style.display = 'none';
        errorDiv.style.display = 'block';
        errorDiv.textContent = 'Error: ' + message;
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
    async function renderPage(pageNum, scale) {
        // Check if page is already rendered and cached
        if (renderedPages.has(pageNum)) {
            const cached = renderedPages.get(pageNum);
            // Update scale if needed
            if (Math.abs(cached.scale - scale) > 0.01) {
                // Remove old wrapper
                const oldWrapper = pdfContainer.querySelector(`.pdf-page-wrapper[data-page="${pageNum}"]`);
                if (oldWrapper) {
                    oldWrapper.remove();
                }
                renderedPages.delete(pageNum);
            } else {
                // Show the cached page
                const existingWrapper = pdfContainer.querySelector(`.pdf-page-wrapper[data-page="${pageNum}"]`);
                if (existingWrapper) {
                    existingWrapper.style.display = 'flex';
                }
                return;
            }
        }

        try {
            const page = await pdfDoc.getPage(pageNum);
            const viewport = page.getViewport({ scale: scale });
            
            // Create wrapper and canvas for this page
            const pageWrapper = document.createElement('div');
            pageWrapper.classList.add('pdf-page-wrapper');
            pageWrapper.setAttribute('data-page', pageNum);
            
            const canvas = document.createElement('canvas');
            canvas.classList.add('pdf-page');
            pageWrapper.appendChild(canvas);
            pdfContainer.appendChild(pageWrapper);
            
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
            
            // Cache the rendered page
            renderedPages.set(pageNum, { scale: scale, wrapper: pageWrapper });
        } catch (error) {
            console.error(`Error rendering page ${pageNum}:`, error);
            showError(`Failed to render page ${pageNum}: ${error.message}`);
        }
    }

    // Show only the current page
    function showCurrentPage() {
        // Hide all pages
        const allWrappers = pdfContainer.querySelectorAll('.pdf-page-wrapper');
        allWrappers.forEach(wrapper => {
            wrapper.style.display = 'none';
        });
        
        // Show current page
        const currentWrapper = pdfContainer.querySelector(`.pdf-page-wrapper[data-page="${currentPage}"]`);
        if (currentWrapper) {
            currentWrapper.style.display = 'flex';
        }
        
        // Update navigation buttons
        prevButton.disabled = currentPage <= 1;
        nextButton.disabled = currentPage >= totalPages;
        
        // Update page info
        currentPageSpan.textContent = currentPage;
    }

    // Render the current page
    async function renderCurrentPage() {
        if (!pdfDoc) return;
        
        const scale = calculateScale();
        loadingDiv.style.display = 'none';
        
        // Render current page if not already rendered
        await renderPage(currentPage, scale);
        showCurrentPage();
    }

    // Navigate to a specific page
    async function goToPage(pageNum) {
        if (pageNum < 1 || pageNum > totalPages) return;
        
        currentPage = pageNum;
        const scale = calculateScale();
        
        // Render the page if not already rendered
        await renderPage(currentPage, scale);
        showCurrentPage();
    }

    // Navigate to previous page
    async function goToPrevPage() {
        if (currentPage > 1) {
            await goToPage(currentPage - 1);
        }
    }

    // Navigate to next page
    async function goToNextPage() {
        if (currentPage < totalPages) {
            await goToPage(currentPage + 1);
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
            // Re-render current page with new scale
            renderedPages.clear();
            renderCurrentPage();
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
            totalPages = pdf.numPages;
            totalPagesSpan.textContent = totalPages;
            console.log('PDF loaded, total pages:', totalPages);
            
            // Render first page
            renderCurrentPage();
        }).catch(error => {
            console.error('Error loading PDF:', error);
            showError('Failed to load PDF. Please check if the file exists. ' + error.message);
        });
    }

    // Add navigation button event listeners
    prevButton.addEventListener('click', goToPrevPage);
    nextButton.addEventListener('click', goToNextPage);

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

