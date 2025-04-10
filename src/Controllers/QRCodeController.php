<?php

namespace phuthinh\qrcode\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    /**
     * Hiển thị trang tạo mã QR.
     */
    public function index()
    {
        return view('qrcode::qrcode');
    }

    /**
     * Xử lý việc tạo mã QR và hiển thị kết quả.
     */
    public function generate(Request $request)
    {
        $data = $request->input('data');
        $qrCode = QrCode::size(200)->generate($data);

        return view('qrcode::qrcode', compact('qrCode'));
    }
}
