@extends('layouts.app')

@section('content')
<div class="page-title">
    <i class="fa-solid fa-camera"></i> Face & QR Attendance Scanner
</div>

<div class="card">
    <div style="margin-bottom: 20px; display: flex; gap: 15px;">
        <button id="btn-qr" class="btn-login" style="width: auto; padding: 10px 20px; background: var(--accent-blue); border: none;">
            <i class="fa-solid fa-qrcode"></i> Scan QR
        </button>
        <button id="btn-face" class="btn-login" style="width: auto; padding: 10px 20px; background: var(--accent-purple); border: none;">
            <i class="fa-solid fa-face-smile"></i> Scan Face
        </button>
    </div>

    <div class="scanner-container">
        <div class="scanner-video-wrapper">
            <div id="reader" style="width: 100%; height: 100%;"></div>
            <video id="face-video" autoplay muted style="display: none;"></video>
            <div class="scanner-overlay"></div>
        </div>

        <div class="scanner-info">
            <h3 style="margin-bottom: 10px;">Recent Scan</h3>
            <div class="scan-result-card" id="scan-result-placeholder">
                <i class="fa-solid fa-fingerprint" style="font-size: 50px; color: var(--text-secondary); margin-bottom: 15px;"></i>
                <h4>Awaiting Scan...</h4>
                <p>Position QR code or Face within the frame.</p>
            </div>

            <div class="scan-result-card" id="scan-result-success" style="display: none;">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="User">
                <h4 id="scanned-name">John Doe</h4>
                <p id="scanned-role" style="margin-bottom: 10px;">Student - Class 10</p>
                <span class="badge badge-success">Attendance Marked</span>
                <p style="margin-top: 15px; font-size: 12px;" id="scanned-time">08:00 AM</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Face API (placeholder script inclusion) -->
<script defer src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnQr = document.getElementById('btn-qr');
        const btnFace = document.getElementById('btn-face');
        const readerDiv = document.getElementById('reader');
        const faceVideo = document.getElementById('face-video');
        
        let html5QrcodeScanner = null;

        function showSuccessResult(text) {
            document.getElementById('scan-result-placeholder').style.display = 'none';
            document.getElementById('scan-result-success').style.display = 'block';
            document.getElementById('scanned-time').innerText = new Date().toLocaleTimeString();
            
            // Simulating API call based on scanned text
            if(text.includes('teacher')) {
                document.getElementById('scanned-name').innerText = 'Mr. Smith';
                document.getElementById('scanned-role').innerText = 'Teacher - Math';
            } else {
                document.getElementById('scanned-name').innerText = 'John Doe';
                document.getElementById('scanned-role').innerText = 'Student - Class 10';
            }
        }

        // --- QR Scanner ---
        btnQr.addEventListener('click', () => {
            readerDiv.style.display = 'block';
            faceVideo.style.display = 'none';

            if (!html5QrcodeScanner) {
                html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: {width: 250, height: 250} }, false);
                html5QrcodeScanner.render((decodedText, decodedResult) => {
                    // Stop scanning once successful
                    html5QrcodeScanner.clear();
                    showSuccessResult(decodedText);
                    
                    // Reset scanner after 3 seconds
                    setTimeout(() => {
                        document.getElementById('scan-result-success').style.display = 'none';
                        document.getElementById('scan-result-placeholder').style.display = 'block';
                        html5QrcodeScanner.render((t, r) => {}, (e) => {});
                    }, 3000);
                }, (errorMessage) => {
                    // parse error, ignore
                });
            }
        });

        // --- Face Scanner (Simulation) ---
        btnFace.addEventListener('click', () => {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear();
                html5QrcodeScanner = null;
            }
            readerDiv.style.display = 'none';
            faceVideo.style.display = 'block';

            // Request webcam
            navigator.mediaDevices.getUserMedia({ video: {} })
                .then(stream => {
                    faceVideo.srcObject = stream;
                    
                    // Simulate face detection after 2 seconds
                    setTimeout(() => {
                        showSuccessResult('student_face_123');
                        
                        setTimeout(() => {
                            document.getElementById('scan-result-success').style.display = 'none';
                            document.getElementById('scan-result-placeholder').style.display = 'block';
                        }, 3000);
                    }, 2000);
                })
                .catch(err => console.error("Webcam error:", err));
        });

        // Start with QR by default
        btnQr.click();
    });
</script>
@endsection
