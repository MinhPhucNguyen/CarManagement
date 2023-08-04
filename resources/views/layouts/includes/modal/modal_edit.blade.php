{{-- EDIT ACCOUNT MODAL --}}
<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close border border-3 rounded-circle" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h1 class="modal-title fs-2 text-center mb-4 fw-bold" id="avatarModalLabel">Cập nhật thông tin</h1>
                <div class="custom-input mb-4">
                    <div class="wrap-info fw-bold mb-1">Tên tài khoản</div>
                    <div class="wrap-input w-100">
                        <input type="text" name="ip_displayname" value="Nguyễn Minh Phúc">
                    </div>
                </div>
                <div class="custom-input mb-4">
                    <div class="wrap-info fw-bold mb-1">Ngày sinh</div>
                    <div class="wrap-input w-100">
                        <input type="text" name="ip_dob" value="16/09/2002">
                    </div>
                </div>
                <div class="custom-input mb-4">
                    <div class="wrap-info fw-bold mb-1">Giới tính</div>
                    <div class="wrap-input w-100">
                        <select class="select_gender w-100 border-0" name="select_gender">
                            <option value="">Nam</option>
                            <option value="">Nữ</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-primary update-btn border-0 w-100 fs-5"
                    style="background: #1cc88a; padding: 16px 24px; font-weight: 500">Cập nhật</button>
            </div>
        </div>
    </div>
</div>

{{-- EDIT PHONE NUMBER --}}
<div class="modal fade" id="addPhoneNumberModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close border border-3 rounded-circle" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h1 class="modal-title fs-2 text-center mb-4 fw-bold" id="editModalLabel">Cập nhật số điện thoại</h1>
                <div class="custom-input mb-4">
                    <div class="wrap-input w-100">
                        <input type="text" name="ip_displayname" placeholder="Số điện thoại">
                    </div>
                </div>
                <button type="button" class="btn btn-primary update-btn border-0 w-100 fs-5"
                    style="background: #1cc88a; padding: 16px 24px; font-weight: 500">Cập nhật</button>
            </div>
        </div>
    </div>
</div>


{{-- Update Email --}}
<div class="modal fade" id="updateEmailModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close border border-3 rounded-circle" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h1 class="modal-title fs-2 text-center mb-4 fw-bold" id="editModalLabel">Cập nhật email</h1>
                <div class="custom-input mb-4">
                    <div class="wrap-input w-100">
                        <input type="text" name="ip_displayname" placeholder="Email mới">
                    </div>
                </div>
                <button type="button" class="btn btn-primary update-btn border-0 w-100 fs-5"
                    style="background: #1cc88a; padding: 16px 24px; font-weight: 500">Cập nhật</button>
            </div>
        </div>
    </div>
</div>