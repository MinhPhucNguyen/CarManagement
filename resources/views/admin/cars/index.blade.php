@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Cars List
                </div>
                <a class="btn btn-success fw-bold float-right" href="{{route('cars.create')}}">
                    <i class="fa-solid fa-plus"></i>
                    Add New Car
                </a>
            </div>
            <div class="card-body">
                {{-- End Filter Role As --}}
                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Name</th>
                            <th>Price (per day)</th>
                            <th>Seats</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @forelse ($carsList as $car)
                            <tr>
                                <td>{{ $car->car_id }}</td>
                                <td>{{ Str::upper($car->brand->brand_name)  }}</td> {{--Str::upper() is uppercase--}}
                                <td><a href="" class="text-success text-decoration-none">{{ $car->car_name }}</a> </td>
                                <td>{{ $car->price }}</td>
                                <td>{{ $car->seats }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item mb-3 fs-6 text-warning bg-white" href="">
                                                    <i class="fa-solid fa-eye"></i>
                                                    <span>View</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item mb-3 fs-6 text-primary bg-white" href="">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item fs-6 text-danger bg-white">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Modal Title
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Modal content goes here.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No User Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
