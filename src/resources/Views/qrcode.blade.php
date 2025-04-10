<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tạo mã QR</title>
</head>
<body>
    <h1>Tạo mã QR</h1>
    <form action="{{ route('qrcode.generate') }}" method="POST">
        @csrf
        <label for="data">Nhập dữ liệu:</label>
        <input type="text" id="data" name="data" required>
        <button type="submit">Tạo mã QR</button>
    </form>

    @isset($qrCode)
        <h2>Mã QR của bạn:</h2>
        {!! $qrCode !!}
    @endisset
</body>
</html>
