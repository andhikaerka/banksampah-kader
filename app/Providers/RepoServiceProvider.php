<?php

namespace App\Providers;

use App\Repositories\KaderRepository;
use App\Repositories\KaderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(KaderRepositoryInterface::class, KaderRepository::class);
        
        // TAMBAH LAGI KALO ADA
        // $this->app->bind(KaderRepositoryInterface::class, KaderRepository::class);
    }
}
