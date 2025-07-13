@extends('layouts.cv-viewer')

@section('title', 'My CV')

@section('content')
<div class="cv-container">
    <!-- Header Controls -->
    <div class="cv-header">
        <div class="cv-title">
            <h1>{{ $cv->name ?? 'My CV' }}</h1>
        </div>

        <div class="cv-controls">
            <button id="fullscreen-btn" class="control-btn" title="Toggle Fullscreen">
                <i class="fas fa-expand"></i>
            </button>
            <a href="{{ $cv->download_url }}" class="control-btn download-btn" title="Download PDF">
                <i class="fas fa-download"></i>
                <span class="btn-text">Download</span>
            </a>
            <button onclick="window.close()" class="control-btn close-btn" title="Close">
                <i class="fas fa-times"></i>
                <span class="btn-text">Close</span>
            </button>
        </div>
    </div>

    <!-- PDF Viewer -->
    <div class="cv-viewer-container">
        <div class="cv-viewer">
            <iframe
                src="{{ $cv->cv_url }}#toolbar=0&navpanes=0&scrollbar=0"
                type="application/pdf"
                class="pdf-frame"
                frameborder="0">
            </iframe>

            <!-- Fallback for browsers that don't support PDF -->
            <div class="pdf-fallback">
                <div class="fallback-content">
                    <i class="fas fa-file-pdf"></i>
                    <h3>PDF Viewer Not Supported</h3>
                    <p>Your browser doesn't support inline PDF viewing.</p>
                    <a href="{{ $cv->download_url }}" class="download-fallback-btn">
                        <i class="fas fa-download"></i>
                        Download CV Instead
                    </a>
                </div>
            </div>
        </div>

        <!-- Loading Indicator -->
        <div class="loading-indicator">
            <div class="spinner"></div>
            <p>Loading CV...</p>
        </div>
    </div>
</div>

<style>
/* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #0a0a0a;
    color: #ffffff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow: hidden;
    height: 100vh;
}

.cv-container {
    height: 100vh;
    display: flex;
    flex-direction: column;
    background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
}

/* Header Styles */
.cv-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 10;
    position: relative;
}

.cv-title h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #ffffff;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.cv-controls {
    display: flex;
    gap: 10px;
    align-items: center;
}

.control-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #ffffff;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9rem;
    backdrop-filter: blur(10px);
}

.control-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    color: #ffffff;
    text-decoration: none;
}

.download-btn:hover {
    background: rgba(74, 144, 226, 0.3);
    border-color: #4a90e2;
}

.close-btn:hover {
    background: rgba(255, 59, 48, 0.3);
    border-color: #ff3b30;
}

.control-btn i {
    font-size: 1rem;
}

/* Viewer Container */
.cv-viewer-container {
    flex: 1;
    position: relative;
    margin: 20px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    background: #ffffff;
}

.cv-viewer {
    width: 100%;
    height: 100%;
    position: relative;
}

.pdf-frame {
    width: 100%;
    height: 100%;
    border: none;
    background: #ffffff;
}

/* Loading Indicator */
.loading-indicator {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #666;
    z-index: 5;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid rgba(255, 255, 255, 0.1);
    border-left: 4px solid #4a90e2;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 15px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Fallback Styles */
.pdf-fallback {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #1a1a1a;
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.fallback-content {
    text-align: center;
    color: #ffffff;
    padding: 40px;
}

.fallback-content i {
    font-size: 4rem;
    color: #4a90e2;
    margin-bottom: 20px;
}

.fallback-content h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #ffffff;
}

.fallback-content p {
    color: #cccccc;
    margin-bottom: 25px;
    font-size: 1rem;
}

.download-fallback-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    background: #4a90e2;
    color: #ffffff;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.download-fallback-btn:hover {
    background: #357abd;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
    color: #ffffff;
    text-decoration: none;
}

/* Fullscreen Styles */
.fullscreen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 9999;
    background: #0a0a0a;
}

.fullscreen .cv-viewer-container {
    margin: 0;
    border-radius: 0;
}

.fullscreen .cv-header {
    background: rgba(0, 0, 0, 0.9);
}

/* Responsive Design */
@media (max-width: 768px) {
    .cv-header {
        padding: 12px 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .cv-title h1 {
        font-size: 1.25rem;
    }

    .control-btn .btn-text {
        display: none;
    }

    .control-btn {
        padding: 10px;
        min-width: 44px;
        justify-content: center;
    }

    .cv-viewer-container {
        margin: 10px;
    }
}

@media (max-width: 480px) {
    .cv-header {
        padding: 10px 15px;
    }

    .cv-controls {
        gap: 5px;
    }

    .control-btn {
        padding: 8px;
        font-size: 0.85rem;
    }
}

/* Dark scrollbar for webkit browsers */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hide loading indicator when iframe loads
    const iframe = document.querySelector('.pdf-frame');
    const loadingIndicator = document.querySelector('.loading-indicator');
    const fallback = document.querySelector('.pdf-fallback');

    iframe.addEventListener('load', function() {
        loadingIndicator.style.display = 'none';
    });

    // Fallback for PDF support
    iframe.addEventListener('error', function() {
        loadingIndicator.style.display = 'none';
        fallback.style.display = 'flex';
    });

    // Fullscreen functionality
    const fullscreenBtn = document.getElementById('fullscreen-btn');
    const container = document.querySelector('.cv-container');

    fullscreenBtn.addEventListener('click', function() {
        if (!document.fullscreenElement) {
            if (container.requestFullscreen) {
                container.requestFullscreen();
            } else if (container.webkitRequestFullscreen) {
                container.webkitRequestFullscreen();
            } else if (container.msRequestFullscreen) {
                container.msRequestFullscreen();
            }
            container.classList.add('fullscreen');
            this.innerHTML = '<i class="fas fa-compress"></i>';
            this.title = 'Exit Fullscreen';
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
            container.classList.remove('fullscreen');
            this.innerHTML = '<i class="fas fa-expand"></i>';
            this.title = 'Toggle Fullscreen';
        }
    });

    // Listen for fullscreen changes
    document.addEventListener('fullscreenchange', function() {
        if (!document.fullscreenElement) {
            container.classList.remove('fullscreen');
            fullscreenBtn.innerHTML = '<i class="fas fa-expand"></i>';
            fullscreenBtn.title = 'Toggle Fullscreen';
        }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.fullscreenElement) {
            window.close();
        } else if (e.key === 'F11') {
            e.preventDefault();
            fullscreenBtn.click();
        } else if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            document.querySelector('.download-btn').click();
        }
    });

    // Prevent context menu on iframe
    iframe.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
});
</script>
@endsection
