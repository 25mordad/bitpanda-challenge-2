<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        $source = request()->source;
        if ($source == "db")
            $this->app->bind(
                'App\Contracts\Services\Api\TransactionApi',
                'App\Services\Api\DBSourceApi'
            );
        elseif ($source == "csv")
            $this->app->bind(
                'App\Contracts\Services\Api\TransactionApi',
                'App\Services\Api\CSVSourceApi'
            );
        //TODO Throw an exception
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
