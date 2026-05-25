<?php

namespace App\Providers;

use App\Domain\Interfaces\ProductRepositoryInterface;
use App\Infrastructure\Repositories\ProductRepository;
use App\Domain\Interfaces\ContentRepositoryInterface;
use App\Infrastructure\Repositories\ContentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            ContentRepositoryInterface::class,
            ContentRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
