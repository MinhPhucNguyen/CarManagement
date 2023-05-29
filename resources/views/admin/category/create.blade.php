@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">
                        <h3>Add Contract
                            <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <h4>User</h4>
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" />
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" rows="3"></textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Image</label><br />
                                    <input type="file" name="image" class="form-control" />
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" />

                                </div>
                                <div class="col-md-12">
                                    <h4>Car</h4>
                                    <div class="col-md-12 mb-3">
                                        <label for="">lincense_plates</label>
                                        <textarea name="lincense_plates" class="form-control" rows="3"></textarea>
                                        @error('lincense_plates')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div cla <div class="col-md-12 mb-3">
                                        <label for="">Note</label>
                                        <textarea name="note" class="form-control" rows="3"></textarea>
                                    </div>


                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary float-end"> Save </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
