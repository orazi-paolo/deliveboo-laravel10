@if (session('message'))
    <div class="toast text-bg-{{ session('alert-class') }} position-fixed top-10 end-5" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bi bi-exclamation-circle me-2"></i>
            <strong class="me-auto">Attention invalid input!</strong>
            <small>{{ \Carbon\Carbon::now()->format('H:i') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('message') }}
        </div>
    </div>
@endif
