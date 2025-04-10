<?php

namespace Smb\Tplus\Facades;

use Illuminate\Support\Facades\Facade;

class QrCode extends Facade
{
    /**
     * Trả về key dùng để resolve service từ container.
     * Ở đây phải khớp với string đăng ký trong ServiceProvider: 'qr_code_service'
     */
    protected static function getFacadeAccessor()
    {
        return 'qr_code_service';
    }
}
