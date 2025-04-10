<?php

namespace Smb\Tplus;

use Illuminate\Support\ServiceProvider;
use Smb\Tplus\Services\QRCodeService;

class QrCodeServiceProvider extends ServiceProvider
{
    /**
     * Đăng ký binding cho service QRCode vào container.
     */
    public function register(): void
    {
        // Đăng ký service dưới alias 'qr_code_service'
        $this->app->singleton('qr_code_service', function () {
            return new QRCodeService();
        });
    }

    /**
     * Bootstrap bất kỳ phần nào khi package được load (nếu cần).
     */
    public function boot(): void
    {
        //
    }
}
