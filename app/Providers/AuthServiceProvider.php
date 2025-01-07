<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\RegisterPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        RegisterPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate للتحقق من صلاحية تسجيل الطبيب
        Gate::define('register-doctor', function ($user) {
            return $user->user_type === 'admin';  // فقط الأدمن يمكنه إضافة دكتور
        });

        // Gate للتحقق من صلاحية تسجيل الأدمن
        Gate::define('register-admin', function ($user) {
            return $user->user_type === 'admin';  // فقط الأدمن يمكنه إضافة أدمن
        });

        Gate::define('admin', function ($user) {
            return $user->user_type === 'admin';  // تأكد من أن المستخدم هو "admin"
        });
    }
}
