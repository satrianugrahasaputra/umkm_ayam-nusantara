<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\MenuRepositoryInterface::class,
            \App\Repositories\EloquentMenuRepository::class
        );
        $this->app->bind(
            \App\Repositories\ReviewRepositoryInterface::class,
            \App\Repositories\EloquentReviewRepository::class
        );
        $this->app->bind(
            \App\Repositories\GalleryRepositoryInterface::class,
            \App\Repositories\EloquentGalleryRepository::class
        );
        $this->app->bind(
            \App\Repositories\ContactRepositoryInterface::class,
            \App\Repositories\EloquentContactRepository::class
        );
        $this->app->bind(
            \App\Repositories\SettingRepositoryInterface::class,
            \App\Repositories\EloquentSettingRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
