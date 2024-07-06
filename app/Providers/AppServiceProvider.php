<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
             $this->app->bind('ArtykulyController', function()
                   {
                      return new ArtykulyController;
                   });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::enforceMorphMap([
            'user' => 'App\Models\User',
            'permission' => 'App\scripts\RolePermission\models\Permission',
            'role'  =>  'App\scripts\RolePermission\models\Role',
        ]);
    }
}
