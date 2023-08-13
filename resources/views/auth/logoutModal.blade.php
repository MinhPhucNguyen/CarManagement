<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close border border-3 rounded-circle" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <h1 class="modal-title fs-3 text-dark w-100 text-center" id="exampleModalLabel">Đăng xuất</h1>
                <h6 class="text-dark text-center fs-5 mt-4">Bạn có chắc chắn muốn đăng xuất?</h6>
            </div>
            <div class="modal-footer w-100">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-100">
                    @csrf
                    <button type="submit" id="logout-btn" class="btn btn-danger fw-bold w-100 p-3 border-0 fs-5"
                        style="background: #1cc88a">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>
</div>
