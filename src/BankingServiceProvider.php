<?php

namespace Banking\Services;

use Banking\Services\Account\BaasWallet;
use Banking\Services\Account\BaasWalletTransaction;
use Illuminate\Support\ServiceProvider;

class BankingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/config/baas.php' => config_path('baas.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->bind(BaasWallet::class, function ($app) {
            return new BaasWallet;
        });
        $this->app->bind(BaasWalletTransaction::class, function ($app) {
            return new BaasWalletTransaction;
        });
    }
}
