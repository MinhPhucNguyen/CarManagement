{{-- Create Brand Modal --}}
{{-- wire:ignore.self:  --}}
<div wire:ignore.self class="modal fade" id="createBrandModal" tabindex="-1" aria-labelledby="createBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createBrandModalLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='addBrand()'>
                    <div class="form-group">
                        <label for="" class="text-dark">Brand Name</label>
                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                            wire:model.defer='brand_name'> {{-- wire:model.defer='' lưu trữ tạm thời các thông tin vừa nhập bên phía client, chỉ gửi thông tin khi click submit button --}}
                        @error('brand_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <label for="" class="text-dark">Status</label>
                        <input type="checkbox" wire:model.defer='status'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success pr-4 pl-4 fw-bold">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Update Brand Modal --}}
<div wire:ignore.self class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editBrandModalLabel">Edit Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="modal-body">
                <form wire:submit.prevent='updateBrand()'>
                    <div class="form-group">
                        <label for="" class="text-dark">Brand Name</label>
                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                            wire:model.defer='brand_name'> {{-- wire:model.defer='' lưu trữ tạm thời các thông tin vừa nhập bên phía client, chỉ gửi thông tin khi click submit button --}}
                        @error('brand_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <label for="" class="text-dark">Status</label>
                        <input type="checkbox" wire:model.defer='status'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success pr-4 pl-4 fw-bold">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Confirm Before Delete Modal --}}
<div wire:ignore.self class="modal fade" id="deleteConfirmModal" tabindex="-1"
    aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteConfirmModalLabel">Delete Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="modal-body">
                <form wire:submit.prevent='destroyBrand()'>
                    <div class="modal-body fw-bold fs-6">
                        Are you sure. You want to delete this brand?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger pr-4 pl-4 fw-bold">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
