<?php

namespace App\Providers;

use Braintree\Gateway;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    "environment" => "sandbox",
                    "merchantId" => "ys9k87xn4qnkh8kq",
                    "publicKey" => "3q8btc6342kr5yc4",
                    "privateKey" => "06c56eb374015386e2bd22621ac807a1"
                ]
            );
        });
    }
}