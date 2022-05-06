<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use Session;

class AuthBasic
{
    public function handle($request, Closure $next)
    {
        // 如果還沒登入
        if (!Auth::check()) {
            $url = $request->url();
            Session::put('redirect', $url);
            return Redirect::to('/login');
        }

        // 這一行代表通過，前面的判斷都沒導頁的話，就通過。最好放最後面
        return $next($request);
    }
}
