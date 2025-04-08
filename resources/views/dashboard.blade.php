@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100 d-flex flex-column px-0">
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-cart-fill me-2"></i>FOLIO PO
            </a>
            <div class="d-flex align-items-center">
                <form method="POST" action="{{ route('logout') }}" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    
</div>
@endsection

@section('styles')
<style>

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background-color: #f8f9fa;
    }

    /* Gradient Backgrounds */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    }
    .bg-gradient-info {
        background: linear-gradient(135deg, #17a2b8 0%, #0d6efd 100%);
    }
    .bg-gradient-success {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
    }

    /* Card Styling */
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
    }
    .card-header {
        border-bottom: none;
    }
    .card-body {
        background-color: #fff;
    }

    /* Button Styling */
    .btn-gradient {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        border: none;
        transition: background 0.3s ease;
    }
    .btn-gradient:hover {
        background: linear-gradient(135deg, #0056b3 0%, #003f7f 100%);
        color: white;
    }
    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
        transition: all 0.3s ease;
    }
    .btn-outline-primary:hover {
        background: #007bff;
        color: white;
    }

    /* Form Inputs */
    .form-control {
        border: 1px solid #ced4da;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Accordion Styling */
    .accordion-button {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    .accordion-button:not(.collapsed) {
        background-color: #e7f1ff;
        color: #0056b3;
    }
    .accordion-body {
        padding: 1rem;
    }

    .table-responsive {
        min-height: 0;
        overflow-x: auto;
    }

    .card-body.overflow-auto {
        max-height: calc(100vh - 200px);
    }

    .bi {
        vertical-align: middle;
    }

    /* Text Colors */
    .text-primary {
        color: #0056b3 !important;
    }
    .text-muted {
        color: #6c757d !important;
    }

    /* Alerts */
    .alert {
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
</style>
@endsection

@section('scripts')
<script>
document.getElementById('importForm').addEventListener('submit', function(e) {
    const fileInput = document.getElementById('fileInput');
    if (fileInput.files.length === 0) {
        e.preventDefault();
        alert('Please select a file first');
        return false;
    }
    
    // Show loading indicator
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Processing...';
    submitBtn.disabled = true;
});

function copyLogs() {
    const logsContent = document.querySelector('pre').textContent;
    navigator.clipboard.writeText(logsContent)
        .then(() => {
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3';
            alert.style.zIndex = '1100';
            alert.innerHTML = `
                <i class="bi bi-clipboard-check me-2"></i>
                Logs copied to clipboard!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alert);
            setTimeout(() => alert.remove(), 3000);
        });
}
</script>
@endsection