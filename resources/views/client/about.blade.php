@extends('layouts.app')

@section('content')
    <div id="about">
        <div class="about-head">
            <div class="about-container">
                <h1>
                    CA<span style="color: #1cc88a">R</span>ENTAL - CÙNG BẠN TRÊN MỌI HÀNH TRÌNH
                </h1>
                <div class="about-head_desc">
                    <p>Mỗi chuyến đi là một hành trình khám phá cuộc sống và thế giới xung quanh, là cơ hội học hỏi và chinh
                        phục những điều mới lạ của mỗi cá nhân để trở nên tốt hơn. Do đó, chất lượng trải nghiệm của khách
                        hàng là ưu tiên hàng đầu và là nguồn cảm hứng của đội ngũ MIOTO.
                    </p>
                    <p>MIOTO là nền tảng chia sẻ ô tô, sứ mệnh của chúng tôi không chỉ dừng lại ở việc kết nối chủ xe và
                        khách hàng một cách Nhanh chóng - An toàn - Tiện lợi, mà còn hướng đến việc truyền cảm hứng KHÁM PHÁ
                        những điều mới lạ đến cộng đồng qua những chuyến đi trên nền tảng của chúng tôi.</p>
                </div>
            </div>
        </div>

        <div class="about-img">
            <div class="about-container">
                <div class="img">
                    <img src="{{ asset('../../image/about/about.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="about-advantage">
            <div class="about-container">
                <div class="about-advantage-container w-100">
                    <h2>NHỮNG LỢI ÍCH CỦA CARENTAL</h2>
                    <div class="list-adv">
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv4.png') }}" alt="">
                            <p>Đặt xe với 1 lần chạm</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv3.png') }}" alt="">
                            <p>Hơn 100 mẫu xe khác nhau</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv2.png') }}" alt="">
                            <p>Carental đã có mặt ở hầu hết các quận huyện và thành phố lớn</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv1.png') }}" alt="">
                            <p>Rẻ hơn 10% so với các xe truyền thống</p>
                        </div>
                        <div class="adv-item">
                            <img src="{{ asset('../../image/about/about-advantage/adv5.png') }}" alt="">
                            <p>Thu nhập 10-15 triệu/tháng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-salient-features">
            <div class="about-container">
                <div class="w-100 d-flex">
                    <h1>TÍNH NĂNG NỔI BẬT CÓ TẠI CA<span style="color: #1cc88a">R</span>ENTAL</h1>
                    <div class="salient-features-list">
                        <div class="salient-features-item">
                            <a class="w-100" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Tính năng lịch
                                <i class="fa-solid fa-plus float-end"></i>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body mt-0 border-0">
                                    Hỗ trợ chủ xe thuận tiện quản lý, theo dõi lịch trình xe một cách khoa học và chủ động
                                    trong việc thiết lập, điều chỉnh giá thuê xe. Cho phép khách thuê xem trước lịch xe chạy
                                    và nhận báo giá thuê xe theo ngày. Do đó, tính năng Lịch sẽ loại bỏ hoàn toàn việc liên
                                    lạc qua điện thoại giữa chủ xe và khách thuê trong việc trao đổi về thời gian và giá
                                    thuê xe, từ đó rút ngắn đáng kể thời gian đặt xe.
                                </div>
                            </div>
                        </div>
                        <div class="salient-features-item">
                            <a class="w-100" data-bs-toggle="collapse" href="#collapseExample1" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Đặt xe nhanh chóng và giao xe tận nơi
                                <i class="fa-solid fa-plus float-end"></i>
                            </a>
                            <div class="collapse" id="collapseExample1">
                                <div class="card card-body mt-0 border-0">
                                    Bạn không có nhiều thời gian, bạn muốn thuê xe nhanh chóng mà không cần qua bước xét
                                    duyệt trực tuyến của chủ xe? Bạn muốn xe được giao tận nhà hay đón trực tiếp tại sân
                                    bay? Tính năng “Đặt hàng nhanh” và “Giao hàng tận nơi” của Mioto sẽ đáp ứng hoàn hảo
                                    những yêu cầu này của bạn. Tại Mioto, chúng tôi có một danh sách dài các chủ xe sẵn sàng
                                    giao xe tận nơi và cho phép bạn thuê xe mà không cần phê duyệt trực tuyến (chỉ cần đến
                                    tận nơi khi nhận xe).
                                </div>
                            </div>
                        </div>
                        <div class="salient-features-item">
                            <a class="w-100" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                GPS trên mọi cung đường
                                <i class="fa-solid fa-plus float-end"></i>
                            </a>
                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body mt-0 border-0">
                                    Carental biết rằng chiếc xe của bạn là tài sản lớn của bạn và việc kinh doanh cho thuê xe tự lái
                                    sẽ luôn tiềm ẩn nhiều rủi ro. Vì vậy, bên cạnh việc hỗ trợ xác thực trước các thông tin
                                    cá nhân quan trọng của khách hàng (Bằng lái xe, CMND, sổ hộ khẩu KT3/giấy tạm trú và
                                    điểm đánh giá), chúng tôi đang phát triển thêm tính năng tích hợp GPS trực tiếp trên ứng
                                    dụng. Với tính năng GPS, chủ xe có thể dễ dàng theo dõi tình trạng, vị trí xe của mình
                                    ngay trên ứng dụng mọi lúc mọi nơi để bạn có thể hoàn toàn yên tâm về phương tiện của
                                    mình.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('app-scripts')
    <script>
        const pushIcons = document.querySelectorAll('.fa-plus');
        const salientFeaturesItems = document.querySelectorAll('.salient-features-item a');
        salientFeaturesItems.forEach(item => {
            item.addEventListener('click', function() {
                pushIcons.forEach(icon => {
                    if (icon.parentElement == item && icon.classList.contains('fa-plus')) {
                        item.style.color = "#1cc88a";
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus')
                    } else if (icon.parentElement == item && icon.classList.contains('fa-minus')) {
                        item.style.color = "black";
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus')
                    }
                })
            })
        })
    </script>
@endpush
