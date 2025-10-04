<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // // 1. Kiểm tra xem người dùng đã đăng nhập chưa
        // // 2. Nếu đã đăng nhập, kiểm tra xem role có phải là 'Admin' không
        // if (Auth::check() && Auth::user()->role == 'Admin') {
        //     // Nếu đúng là Admin, cho phép request đi tiếp
        //     return $next($request);
        // }

        // // Nếu không phải Admin (hoặc chưa đăng nhập), chuyển hướng về trang chủ
        return redirect('/');
    }
}
