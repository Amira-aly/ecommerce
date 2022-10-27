<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\CategoryRepository;
use App\Repository\CountryRepositoryInterface;
use App\Repository\CountryRepository;
use App\Repository\ProdectRepositoryInterface;
use App\Repository\ProdectRepository;
use App\Repository\CartRepositoryInterface;
use App\Repository\CartRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class ,
            CategoryRepository::class
        );
        $this->app->bind(
            CountryRepositoryInterface::class ,
            CountryRepository::class
        );
        $this->app->bind(
            ProdectRepositoryInterface::class ,
            ProdectRepository::class
        );
        $this->app->bind(
            CartRepositoryInterface::class ,
            CartRepository::class
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
