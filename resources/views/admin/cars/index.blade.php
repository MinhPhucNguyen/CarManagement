@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Cars List
                </div>
                <a class="btn btn-success fw-bold float-right ">
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
                            <td>price</td>
                            <td>image</td>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @forelse ($carsList as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td><a href="#">{{ $car->name }}</a></td>
                                <td>{{ $car->price }}</td>
                                <td>{{ $car->image }}</td>

                                <td class="d-flex">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No User Available</td>
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

