<?php
// app/Providers/QRCodeServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class QRCodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        require_once base_path('vendor/phpqrcode/phpqrcode.php');
    }
}
