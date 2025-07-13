@extends('layouts.app')

@section('title', 'My CV')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="cv-header d-flex justify-content-between align-items-center mb-4">
                <h2>My CV</h2>
                <div class="cv-controls">
                    <button id="prev-page" class="btn btn-outline-secondary">Previous</button>
                    <span id="page-info" class="mx-3">Page 1 of 1</span>
                    <button id="next-page" class="btn btn-outline-secondary">Next</button>
                    <button id="zoom-out" class="btn btn-outline-secondary ms-3">-</button>
                    <span id="zoom-level" class="mx-2">100%</span>
                    <button id="zoom-in" class="btn btn-outline-secondary">+</button>
                    <a href="{{ $cv->download_url }}" class="btn btn-primary ms-3">Download</a>
                </div>
            </div>

            <div class="cv-canvas-container text-center">
                <canvas id="pdf-canvas" class="border"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
const pdfUrl = '{{ $cv->cv_url }}';
let pdfDoc = null;
let pageNum = 1;
let pageCount = 0;
let scale = 1.0;
const canvas = document.getElementById('pdf-canvas');
const ctx = canvas.getContext('2d');

// Load PDF
pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
    pdfDoc = pdf;
    pageCount = pdf.numPages;
    renderPage(pageNum);
    updatePageInfo();
});

// Render page
function renderPage(num) {
    pdfDoc.getPage(num).then(page => {
        const viewport = page.getViewport({ scale: scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };

        page.render(renderContext);
    });
}

// Page navigation
document.getElementById('prev-page').addEventListener('click', () => {
    if (pageNum > 1) {
        pageNum--;
        renderPage(pageNum);
        updatePageInfo();
    }
});

document.getElementById('next-page').addEventListener('click', () => {
    if (pageNum < pageCount) {
        pageNum++;
        renderPage(pageNum);
        updatePageInfo();
    }
});

// Zoom controls
document.getElementById('zoom-in').addEventListener('click', () => {
    scale += 0.25;
    renderPage(pageNum);
    updateZoomLevel();
});

document.getElementById('zoom-out').addEventListener('click', () => {
    if (scale > 0.5) {
        scale -= 0.25;
        renderPage(pageNum);
        updateZoomLevel();
    }
});

function updatePageInfo() {
    document.getElementById('page-info').textContent = `Page ${pageNum} of ${pageCount}`;
}

function updateZoomLevel() {
    document.getElementById('zoom-level').textContent = `${Math.round(scale * 100)}%`;
}
</script>
@endsection
