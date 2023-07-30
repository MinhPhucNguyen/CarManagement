{{-- Add New Feature --}}
<div wire:ignore.self class="modal fade" id="createFeatureModal" tabindex="-1" aria-labelledby="createFeatureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createFeatureModalLabel">Add Feature</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='addFeature()'>
                    <div class="form-group">
                        <label for="" class="text-dark">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            wire:model.defer='name' autofocus> {{-- wire:model.defer='' lưu trữ tạm thời các thông tin vừa nhập bên phía client, chỉ gửi thông tin khi click submit button --}}
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-dark">Logo</label>
                        <input type="text" class="form-control @error('logo') is-invalid @enderror"
                            wire:model.defer='logo'> {{-- wire:model.defer='' lưu trữ tạm thời các thông tin vừa nhập bên phía client, chỉ gửi thông tin khi click submit button --}}
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


{{-- Update Feature Modal --}}
<div wire:ignore.self class="modal fade" id="editFeatureModal" tabindex="-1" aria-labelledby="editFeatureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editFeatureModalLabel">Edit Feature</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div wire:loading class="p-2 text-center">
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="modal-body">
                <form wire:submit.prevent='updateFeature()'>
                    <div class="form-group">
                        <label for="" class="text-dark">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            wire:model.defer='name'> {{-- wire:model.defer='' lưu trữ tạm thời các thông tin vừa nhập bên phía client, chỉ gửi thông tin khi click submit button --}}
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-dark">Logo</label>
                        <input type="text" class="form-control @error('logo') is-invalid @enderror"
                            wire:model.defer='logo'> {{-- wire:model.defer='' lưu trữ tạm thời các thông tin vừa nhập bên phía client, chỉ gửi thông tin khi click submit button --}}
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
                <form wire:submit.prevent='destroyFeature()'>
                    <div class="modal-body fw-bold fs-6">
                        Are you sure. You want to delete this feature?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success pr-4 pl-4 fw-bold">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
