<?php

namespace App\Policies;

use App\Models\User;

class RegisterPolicy
{
    /**
     * Create a new policy instance.
     */
    public function registerDoctor(User $user)
    {
        return $user->user_type === 'admin'; // فقط الأدمن يمكنه تسجيل دكتور
    }

    public function registerAdmin(User $user)
    {
        return $user->user_type === 'admin'; // فقط الأدمن يمكنه تسجيل أدمن
    }
    public function __construct()
    {
        //
    }
}
