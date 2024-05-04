<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\Models\Document' => 'App\Policies\DocumentPolicy',
        'App\Models\Application' => 'App\Policies\ApplicationPolicy',
        'App\Models\TObject' => 'App\Policies\ParentObjectPolicy',
        'App\Models\SObject' => 'App\Policies\ParentObjectPolicy',
        'App\Models\RObject' => 'App\Policies\ParentObjectPolicy',
        'App\Models\MObject' => 'App\Policies\ParentObjectPolicy',
        'App\Models\Endpoint' => 'App\Policies\EndpointPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('VIEW_ADMIN', function ($user){
            return $user->canDo('VIEW_ADMIN');
        });
        Gate::define('MANAGE_USERS', function ($user){
            return $user->canDo('MANAGE_USERS');
        });
        Gate::define('MANAGE_MENUS', function ($user){
            return $user->canDo('MANAGE_MENUS');
        });
        Gate::define('MANAGE_DOCUMENTS', function ($user){
            return $user->canDo('MANAGE_DOCUMENTS');
        });
        Gate::define('MANAGE_DICTIONARY', function ($user){
            return $user->canDo('MANAGE_DICTIONARY');
        });
        Gate::define( 'MANAGE_APPLICATIONS', function ($user){
            return $user->canDo('MANAGE_APPLICATIONS');
        });
        Gate::define( 'GIVE_APPLICATION', function ($user){
            return $user->canDo('GIVE_APPLICATION');
        });
        Gate::define( 'MODERATE_APPLICATION', function ($user){
            return $user->canDo('MODERATE_APPLICATION');
        });
        Gate::define( 'MODERATE_OBJECTS', function ($user){
            return $user->canDo('MODERATE_OBJECTS');
        });
        Gate::define( 'MODERATE_ENDPOINTS', function ($user){
            return $user->canDo('MODERATE_ENDPOINTS');
        });
        Gate::define( 'ADD_OBJECT', function ($user){
            return $user->canDo('ADD_OBJECT');
        });
        Gate::define( 'ADD_ENDPOINT', function ($user){
            return $user->canDo('ADD_ENDPOINT');
        });
        Gate::define( 'MONITOR', function ($user){
            return $user->canDo('MONITOR');
        });
    }
}
