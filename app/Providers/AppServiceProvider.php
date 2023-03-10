<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use App\Observers\UserObserver;
use App\Models\User;
use App\Models\Pedidos;
use App\Observers\OrderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ini_set('display_errors', '0');
        ini_set('display_startup_errors', '0');
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        User::observe(UserObserver::class);
        Pedidos::observe(OrderObserver::class);
    }
}
