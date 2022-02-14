<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(PaymentService::class, function ($app){
//            return new PaymentService(config('liqpay.privat_key'), config('liqpay.privat_key'));
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
