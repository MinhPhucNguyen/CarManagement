@extends('layouts.admin')
@section('content')
    <div class="col-md-12">

        @include('layouts.includes.alert.alert_message')

        <form action="" method="GET" class="m-0 w-50">
            <div class="mb-3 align-items-center d-inline-block mr-4 w-25">
                <div class="d-flex align-items-center">
                    <label for="filterByBrand" class="form-label mb-0 fw-bolder">Filter by Brand:</label>
                </div>
                <select name="filterByBrand" class="form-select mt-2 filter-by ">
                    <option value="all">All</option>
                    @foreach ($brands as $brand)
                        <option value='{{ $brand->brand_id }}'
                            {{ request('filterByBrand') == $brand->brand_id ? 'selected' : '' }}>
                            {{ $brand->brand_name }}</option>
                    @endforeach
                    </option>
                </select>
            </div>

            <div class="mb-3 align-items-center  d-inline-block ml-2 w-25">
                <div class="d-flex align-items-center">
                    <label for="filterByFuel" class="form-label mb-0 fw-bolder">Filter by Fuel:</label>
                </div>
                <select name="filterByFuel" class="form-select mt-2 filter-by-fuel">
                    <option value="all">All fuels</option>
                    @foreach ($fuels as $fuel)
                        <option value='{{ $fuel->fuel }}' {{ request('filterByFuel') == $fuel->fuel ? 'selected' : '' }}>
                            {{ $fuel->fuel }}</option>
                    @endforeach
                    </option>
                </select>
            </div>
        </form>

        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Cars List
                </div>
                @if (route('admin.search') == request()->url())
                    <a href="{{ url('admin/cars/') }}" class="btn btn-danger fw-bold float-right ml-3">
                        <i class="fa-solid fa-arrow-left"></i>
                        BACK
                    </a>
                @else
                    <a class="btn btn-success fw-bold float-right" href="{{ route('cars.create') }}">
                        <i class="fa-solid fa-plus"></i>
                        Add New Car
                    </a>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-dark fw-bold">
                    <thead>
                        <tr class="text-dark">
                            <th data-sort="car_id">
                                ID
                                <span class="sort-id-icon float-end">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <i class="fa-solid fa-arrow-up text-muted "></i>
                                </span>
                            </th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price (per day)</th>
                            <th class="text-center">Seats</th>
                            <th class="text-center">Fuel</th>
                            <th class="text-center">Fuel Consumption</th>
                            <th class="text-center">Transmission</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Trip</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="body-table">
                        @forelse ($carsList as $car)
                            <tr>
                                <td class="text-center">{{ $car->car_id }}</td>
                                <td class="text-center">{{ Str::upper($car->brand->brand_name) }}</td>
                                {{-- Str::upper() is uppercase --}}
                                <td class="text-center"><a href=""
                                        class="text-success text-decoration-none">{{ $car->car_name }}</a>
                                </td>
                                <td class="text-center">{{ $car->price }}</td>
                                <td class="text-center">{{ $car->seats }}</td>
                                <td class="text-center">{{ $car->fuel }}</td>
                                <td class="text-center">{{ $car->fuel_consumption }}</td>
                                <td class="text-center">{{ $car->transmission == 0 ? 'Automatic' : 'Manual' }}</td>
                                <td class="text-center">{{ $car->location }}</td>
                                <td class="text-center">{{ $car->number_of_trip }}</td>
                                <td class="text-center">{{ $car->status == '1' ? 'Visibility' : 'Unvisibility' }}</td>
                                <td class="text-center">
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
                                                <a class="dropdown-item mb-3 fs-6 text-primary bg-white"
                                                    href="{{ route('cars.edit', $car->car_id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <span>Edit</span>
                                                </a>
                                            </li>
                                            <button type="button" class="dropdown-item fs-6 text-danger bg-white"
                                                data-bs-toggle="modal" data-bs-target="#deleteCarModal{{ $car->car_id }}">
                                                <i class="fa-solid fa-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="deleteCarModal{{ $car->car_id }}" tabindex="-1"
                                aria-labelledby="deleteCarModalLabel{{ $car->car_id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteCarModalLabel{{ $car->car_id }}">Delete
                                                Confirmation</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>
                                                Are you sure, you want to delete this car ?
                                            </strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('cars.destroy', $car->car_id, '/delete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="12">No Car Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $carsList->links() }}
            </div>
        </div>
    </div>
@endsection
