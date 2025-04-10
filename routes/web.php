<?php
use Illuminate\Support\Facades\Route;

use Smb\Tplus\Controllers\QRCodeController;

// Khởi tạo routes đơn giản

Route::get('qrcode', [QrCodeController::class, 'index'])->name('qrcode.index');
Route::post('qrcode', [QrCodeController::class, 'generate'])->name('qrcode.generate');
