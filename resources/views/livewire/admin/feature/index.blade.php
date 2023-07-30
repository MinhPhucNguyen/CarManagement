<div>
    @include('livewire.admin.feature.modal_form')

    <div class="col-md-12 p-0">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check"></i>
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    style="padding: 1.05rem 1rem"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header  bg-dark d-flex align-items-center">
                <div class="d-inline-block fw-bold text-white fs-4 flex-grow-1">
                    Features List
                </div>
                <div>
                    <button class="btn btn-success fw-bold float-right ml-3" data-bs-toggle="modal"
                        data-bs-target="#createFeatureModal">
                        <i class="fa-solid fa-plus"></i>
                        Add New Feature
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-dark">
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($features as $feature)
                            <tr>
                                <td class="text-center">{{ $feature->id }}</td>
                                <td class="text-center">{{ $feature->name }}</td>
                                <td class="text-center">{{ $feature->logo }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="button"
                                                    class="dropdown-item mb-3 fs-6 text-success bg-white"
                                                    data-bs-toggle="modal" data-bs-target="#editFeatureModal"
                                                    wire:click="editFeature({{ $feature->id }})">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item fs-6 text-danger bg-white"
                                                    data-bs-toggle="modal" data-bs-target="#deleteConfirmModal"
                                                    wire:click="deleteFeature({{ $feature->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Feature Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', e => {
            $('#createFeatureModal').modal('hide');
            $('#editFeatureModal').modal('hide');
            $('#deleteConfirmModal').modal('hide');

            // Auto close alert when add brand success
            setTimeout(() => {
                $('.alert').remove();
            }, 2000);
        })
    </script>
@endpush
