<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div style="width: 100%; background: white; padding: 200px 0 color: black">
        <h1 style="text-align: center; font-size: 30px">CARENTAL</h1>
        <div
            style="width: 50%; margin: 0 auto; background: white; border: 1px solid #ccc; border-radius: 10px; border-top: 3px solid #1cc88a; padding: 50px 20px">
            <h2>XÁC THỰC THÔNG TIN!</h2>
            <div>
                <p style="color: black"> <strong style="margin-right: 8px; font-size: 16px">Xin chào </strong><a
                        href="">{{ $email }}</a>!
                </p>
                <p style="font-size: 16px">Chào mừng bạn đến với ứng dụng thuê xe của chúng tôi. Vui lòng bấm nút bên
                    dưới để xác thực địa chỉ
                    email của bạn.</p>
                <div style="display: flex; justify-content: center">
                    <a style="
                        text-decoration: none; 
                        background-color: #1cc88a; 
                        padding: 14px 28px; 
                        font-weight: bold; 
                        color: white; 
                        border-radius: 10px;
                        margin: 40px 0;"
                        href="{{ $url }}">XÁC
                        THỰC EMAIL</a>
                </div>
                <p>
                    *Đây là email xác thực, xin vui lòng không trả lời email!
                </p>
                <p>
                    Cảm ơn bạn,
                </p>
                <p style="font-weight: bold">
                    CA<span style="color: #1cc88a; margin-top: 20px">R</span>ENTAL
                </p>
            </div>
        </div>
    </div>
</body>

</html>
