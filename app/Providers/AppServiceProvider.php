<?php

namespace App\Providers;

use App\Exceptions\Cms\Handler;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;

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
        if (preg_match('/^cms\/.+$/', request()->path())) {
            if (class_exists(Handler::class)) {
                app()->singleton(ExceptionHandler::class, Handler::class);
            }
        }
    }
}
