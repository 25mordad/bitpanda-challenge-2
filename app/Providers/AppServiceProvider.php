<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use App\Exceptions\UnknownSourceException;

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
        else
            throw new UnknownSourceException();
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
