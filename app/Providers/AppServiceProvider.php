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
        $this->app->bind('App\Contracts\Dao\Users\UsersApiDaoInterface', 'App\Dao\Users\UsersApiDao');
        $this->app->bind('App\Contracts\Dao\Posts\PostsDaoInterface', 'App\Dao\Posts\PostsDao');
        $this->app->bind('App\Contracts\Dao\Posts\PostsApiDaoInterface', 'App\Dao\Posts\PostsApiDao');

        $this->app->bind('App\Contracts\Services\Users\UsersServiceInterface', 'App\Services\Users\UsersService');
        $this->app->bind('App\Contracts\Services\Users\UsersApiServiceInterface', 'App\Services\Users\UsersApiService');
        $this->app->bind('App\Contracts\Services\Posts\PostsServiceInterface', 'App\Services\Posts\PostsService');
        $this->app->bind('App\Contracts\Services\Posts\PostsApiServiceInterface', 'App\Services\Posts\PostsApiService');
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
