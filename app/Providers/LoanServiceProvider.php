<?php

namespace App\Providers;

use App\Repositories\Eloquent\LoanRepository;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class LoanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoanRepositoryInterface::class,LoanRepository::class
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
