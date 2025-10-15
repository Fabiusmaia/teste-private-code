<?php

namespace App\Providers;

use App\Repository\CommentRepository;
use App\Repository\Interfaces\CommentRepositoryInterface;
use App\Repository\RatingRepository;
use App\Repository\Interfaces\RatingRepositoryInterface;
use App\Repository\RecipeRepository;
use App\Repository\Interfaces\RecipeRepositoryInterface;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RecipeRepositoryInterface::class, RecipeRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(RatingRepositoryInterface::class, RatingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
