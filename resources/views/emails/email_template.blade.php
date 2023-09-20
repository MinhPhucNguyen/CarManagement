<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
</head>

<body>
    <div style="width: 100%; background: white; padding: 50px 0; text-align: center; color: black">
        <h1 style="text-align: center; font-size: 30px">CARENTAL</h1>

        <div
            style="width: 50%; margin: 0 auto; background: white; border: 1px solid #ccc; border-radius: 10px; border-top: 3px solid #1cc88a; padding: 20px">
            <div>
                <p style="color: black">Xin chào<strong style="margin-left: 8px">{{ $emailData['emailTo'] }}</strong>
                </p>
                <div style="margin: 20px 0; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 10px 0">
                    <p style="color: black">{{ $emailData['message'] }}</p>
                </div>
            </div>

            <div style="margin-top: 30px">
                <p style="margin-bottom: 10px; font-size: 14px">*Nếu bạn có bất
                    kỳ vấn đề nào, vui lòng gửi email cho chúng tôi </p>

            </div>
            <div style="margin-top: 30px">
                <p style="margin-bottom: 10px; font-weight: bold">Cảm ơn!</p>
                <p style="font-weight: bold">
                    CA<span style="color: #1cc88a; margin-top: 20px">R</span>ENTAL
                </p>
            </div>
        </div>
    </div>
</body>

</html>
