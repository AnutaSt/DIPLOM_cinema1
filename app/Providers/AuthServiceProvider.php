<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use MoonShine\Models\MoonshineUser;
use App\Policies\MoonshineUserPolicy;
use MoonShine\Models\MoonshineUserRole;
use App\Policies\MoonshineUserRolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MoonshineUserRole::class => MoonshineUserRolePolicy::class,
        MoonshineUser::class => MoonshineUserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
