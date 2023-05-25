@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Cars List
                </div>
                <a href="{{ url('admin/cars/create') }}" class="btn btn-success fw-bold float-right ml-3">
                    <i class="fa-solid fa-plus"></i>
                    Add New Car
                </a>
            </div>
            <div class="card-body">
                {{-- End Filter Role As --}}

                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <td>ID</td>
                            <td>name</td>
                            <td>CarLicensePlate</td>
                            <td>Color</td>
                            <td>price</td>
                            <td>image</td>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @forelse ($carsList as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td><a href="{{ url('admin/cars/' . $car->id . '/view') }}">{{ $car->carName }}</a></td>
                                <td>{{ $car->CarLicensePlate}}</td>
                                <td>{{ $car->color}}</td>
                                <td>{{ $car->price }}</td>
                                <td><img src="{{ asset('/upload/cars/' . $car->image) }}" width="60px"
                                        height="30px"></td>
                                <td class="d-flex">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item mb-3 fs-6 text-success bg-white"
                                                    href="{{ url('admin/cars/' . $car->id . '/edit') }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ url('admin/cars/' . $car->id . '/delete') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item fs-6 text-danger bg-white">
                                                        <i class="fa-solid fa-trash"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Car Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">
                    {!! $carsList->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

