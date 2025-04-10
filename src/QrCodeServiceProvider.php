<?php

namespace Smb\Tplus;

use Illuminate\Support\ServiceProvider;
use Smb\Tplus\Services\QRCodeService;

class QRCodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Đăng ký routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'qrcode');
    }

    /**
     * Register any application services
     */
    public function register()
    {
        // Đăng ký bindings hoặc singletons nếu cần
    }
}
