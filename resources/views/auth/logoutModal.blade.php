<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <h6 class="text-dark fw-bold">Are you sure you want to logout ?</h6>
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger fw-bold">Submit Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
