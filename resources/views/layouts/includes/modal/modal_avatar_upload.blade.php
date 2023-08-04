<div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close border border-3 rounded-circle"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h1 class="modal-title fs-3 text-center" id="avatarModalLabel">Cập nhật ảnh đại diện</h1>
                <input type="file" name="ip_upload_avatar" class="d-none">
                <button type="button"
                    class="btn btn-primary choose-avatar-btn hover-shadow rounded-pill border-0 text-uppercase"
                    style="margin: 40px auto; background: #1cc88a; padding: 16px 24px; font-weight: 500">Chọn hình</button>
            </div>
        </div>
    </div>
</div>

@push('app-scripts')
    <script>
        const chooseAvatarBtn = document.querySelector('.choose-avatar-btn');
        const inputUploadAvatar = document.querySelector("input[name=ip_upload_avatar]");
        chooseAvatarBtn.addEventListener('click', () => {
            inputUploadAvatar.click();
        })
    </script>
@endpush
