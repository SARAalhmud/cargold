<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {


        $userRole = Auth::user()->role;

        // السماح للبائع والمدير بالوصول لجميع الصفحات
        if ($userRole === 'admin' || $userRole === 'seller') {
            return $next($request);
        }

        // إذا كان المستخدم العادي ويحاول الوصول إلى صفحة محجوزة له
        // مثلاً إذا كانت هذه الصفحة غير مسموحة للمستخدم العادي، سيتم إعادة التوجيه
        if ($role && $userRole === 'user') {
            return redirect('/')->with('error', 'ليس لديك صلاحية للوصول لهذه الصفحة');
        }

        return $next($request);
    }
}
