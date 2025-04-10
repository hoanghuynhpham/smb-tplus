<?php

use Smb\Tplus\Controllers\QRCodeController;

// Dùng nếu chưa có autoload composer:
require_once __DIR__ . '/src/Controllers/QRCodeController.php';
require_once __DIR__ . '/src/Services/QRCodeService.php';

// Khởi tạo controller và gọi hàm xử lý
$controller = new QRCodeController();
$controller->showForm();
