@extends('layouts.app')

@section('content')
    <div class="test-class">

    </div>
@endsection

@push('app-scripts')
    <script>
        const testClass = document.querySelector('.test-class');
        const getCar = async () => {
            const car_id = '{{ $car }}'
            const response = await fetch(`http://127.0.0.1:8000/api/v2/cars/${car_id}`);
            const data = await response.json();
            return data;
        }

        getCar()
            .then((response) => {
                const html = response.data.carname;
                testClass.innerHTML = html;
            })
            .catch((err) => {
                alert(err);
            })
    </script>
@endpush
