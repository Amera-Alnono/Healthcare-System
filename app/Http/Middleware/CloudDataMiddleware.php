<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CloudDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


       // تحقق من أن المستخدم مسجل دخوله
       if (auth()->check()) {
        $user = auth()->user();
//dd($user->user_type === 'admin');
        // السماح للمدير فقط بالوصول إلى البيانات السحابية
        if ($user->user_type === 'admin') {
            return $next($request);
        }

        // السماح للمرضى بتحديث بياناتهم الخاصة فقط
        if ($user->user_type === 'patient') {
            // السماح للمرضى فقط بتحديث بياناتهم
            if ($request->is('patients/update') && $request->method() === 'POST') {
                return $next($request);
            }
        }

        // إذا لم يكن المستخدم إداريًا وطلب الوصول إلى مسارات تعديل البيانات السحابية
        // if ($request->is('cloud-data/*') && $user->user_type !== 'admin') {
        //     abort(403, 'Unauthorized action. Only admins can modify cloud data.');
        // }
    }

    return $next($request);

    }
}
