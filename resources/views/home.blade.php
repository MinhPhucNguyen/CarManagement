@extends('layouts.app')

@section('content')
    @if (session()->has('success')) {{-- Kiểm tra key success có tồn tại trọng session không --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2>Welcome to home page</h2>
    @forelse ($carsList as $car)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://cdn.shopify.com/s/files/1/0580/0031/0432/files/bang_gia_xe_o_to_moi_nhat.png?v=1678249206" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Thông tin xe: </h5>
            <p class="card-text">Tên: Mazda Cx5</p>
            <p class="card-text">Màu xe: Trắng</p>
            <p class="card-text">Giá: 200.00VNĐ / 1ngày</p>
            </div>
            <div class="card-body">
                <a href="{{ route('login') }}" class="btn btn-primary" 
                data-bs-toggle="modal" data-bs-target="#exampleModal"
                >
                    Đặt xe 
                </a>
            </div>
        </div>
    @empty
        <tr>
            <td colspan="5">No Car Available</td>
        </tr>
    @endforelse
  
    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vui lòng điền thông tin cá nhân</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="username">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                   
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                    
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
 
@endsection
