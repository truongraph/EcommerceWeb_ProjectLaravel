<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.menu', function ($view) {
            $categories = Category::where('id_parent', null)->with('childCategories')->get();
            $view->with('categories', $categories);
        });
    }
}
