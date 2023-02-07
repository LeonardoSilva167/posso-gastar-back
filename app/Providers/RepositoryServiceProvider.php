<?php

namespace App\Providers;

use App\Repositories\GroupRepository\GroupRepository;
use App\Repositories\GroupRepository\GroupRepositoryInterface;
use App\Repositories\SubgroupRepository\SubgroupRepository;
use App\Repositories\SubgroupRepository\SubgroupRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( GroupRepository::class,GroupRepositoryInterface::class);
        $this->app->bind( SubgroupRepository::class,SubgroupRepositoryInterface::class);

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
