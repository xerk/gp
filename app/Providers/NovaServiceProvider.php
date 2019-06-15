<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\NewUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Naif\NovaPushNotification\NovaPushNotification;
use App\Nova\Metrics\NewClient;
use App\Nova\Metrics\CountComments;
use App\Nova\Metrics\SumCities;
use App\Nova\Metrics\SumRegions;
use App\Nova\Metrics\NewOrders;
use App\Nova\Metrics\UsersPerDay;
use App\Nova\Metrics\OrdersPerDay;
use App\Nova\Metrics\CommentsPerDay;
use App\Nova\Metrics\UsersPerPlan;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->hasPermissionTo('Browes Nova') ? $user->hasPermissionTo('Browes Nova') : Auth::logout();
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new UsersPerPlan,
            new NewUsers,
            new NewClient,
            new NewOrders,
            new CountComments,
            new SumCities,
            new SumRegions,
            new UsersPerDay,
            new OrdersPerDay,
            new CommentsPerDay,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            \Eminiarts\NovaPermissions\NovaPermissions::make(),
            // new NovaPushNotification(),
            new \Infinety\MenuBuilder\MenuBuilder(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
