@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-sharp fa-solid fa-circle-check"></i>
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
            style="padding: 1.05rem 1rem"></button>
    </div>
@endif
