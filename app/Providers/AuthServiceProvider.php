<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role->name, ['Administrator']);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role->name, ['Administrator']);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role->name, ['Administrator']);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role->name, ['Administrator']);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role->name, ['Administrator']);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role->name, ['Administrator']);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Location
        Gate::define('location_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('location_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('location_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('location_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('location_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Computers
        Gate::define('computer_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('computer_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('computer_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('computer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('computer_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Printers
        Gate::define('printer_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('printer_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('printer_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('printer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('printer_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Apps
        Gate::define('app_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('app_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('app_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('app_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('app_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Contact management
        Gate::define('contact_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Contact companies
        Gate::define('contact_company_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contacts
        Gate::define('contact_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
