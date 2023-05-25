<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>sure delete</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <!-- Page Heading -->

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-sharp fa-solid fa-circle-check"></i>
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                    style="padding: 1.05rem 1rem"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">

                @if (session('messages'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Category
                            <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Add
                                category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->Status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td><a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="#" wire:click="deleteCategory({{ $category->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div>{{ $categories->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
