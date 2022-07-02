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
                    "merchantId" => "jx2yhpkvfyk6hz5c",
                    "publicKey" => "xmwzjdvnrd44n5tf",
                    "privateKey" => "98b9da7492f590ef06ef95b151de80e7"
                ]
            );
        });
    }
}
