<?php

namespace Lvyac\Qrcode;

use Encore\Admin\Grid\Column;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class QrcodeProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->booted(function () {
            Route::middleware(['web'])->group(\dirname(__DIR__).'/src/route.php');
            Column::extend('qrcodedl', Qrcode::class);
        });
    }
}