{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible d-flex justify-content-between" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible d-flex justify-content-between" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="bi bi-x-lg"></i>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif