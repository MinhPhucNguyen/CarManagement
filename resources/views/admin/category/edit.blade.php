@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">
                        <h3>Edit Category
                            <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/category/' . $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <h4>User</h4>
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}"
                                        class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" value="{{ $category->phone }}"
                                        class="form-control" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" rows="3">{{ $category->address }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Image</label><br />
                                    <input type="file" name="image" class="form-control" /><img
                                        src="{{ asset('/upload/category/' . $category->image) }}" width="60px"
                                        height="60px">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status"{{ $category->status == '1' ? 'checked' : '' }} />

                                </div>
                                <div class="col-md-12">
                                    <h4>Car</h4>
                                    <div class="col-md-12 mb-3">
                                        <label for="">lincense_plates</label>
                                        <textarea name="lincense_plates" class="form-control" rows="3">{{ $category->lincense_plates }}</textarea>
                                    </div>
                                    <div cla <div class="col-md-12 mb-3">
                                        <label for="">Note</label>
                                        <textarea name="note" class="form-control" rows="3">{{ $category->note }}</textarea>
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
