<?php

namespace App\Providers;

use App\Repositories\Eloquent\DepartmentRepository;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class DepartmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DepartmentRepositoryInterface::class,DepartmentRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
