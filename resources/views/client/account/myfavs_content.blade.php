@extends('client.account.account_layout')

@section('account-content')
    <div class="title fs-1 fw-bold">Xe yêu thích của tôi</div>
    <div class="tab-mode d-flex align-items-center">
        <div class="tab-mode-item active w-50">Xe tự lái</div>
        <div class="tab-mode-item w-50">Xe có tài xế</div>
    </div>
    <div class="empty-car w-100">
        <img src="{{ asset('../../image/myfavs_tab_mode/empty-favcar.2c855700.svg') }}" alt="empty_car" width="400px" height="400px">
        <p>Không có xe yêu thích</p>
    </div>
@endsection

