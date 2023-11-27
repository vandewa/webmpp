<?php

namespace App\Providers;

use App\Models\InformasiUmum;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
            $visitor = DB::table('visitors')->count();
            View::share('visitor', $visitor);
            $pembaca = DB::table('views')->count();
            View::share('pembaca', $pembaca);
            $info = DB::table('informasi_umums')->first();
            View::share('info', $info);
        }
        


    }
}
