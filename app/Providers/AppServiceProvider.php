<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Dao\Users\UsersDaoInterface', 'App\Dao\Users\UsersDao');
        $this->app->bind('App\Contracts\Dao\Posts\PostsDaoInterface', 'App\Dao\Posts\PostsDao');

        $this->app->bind('App\Contracts\Services\Users\UsersServiceInterface', 'App\Services\Users\UsersService');
        $this->app->bind('App\Contracts\Services\Posts\PostsServiceInterface', 'App\Services\Posts\PostsService');
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
