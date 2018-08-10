<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Add the next two lines:
        $action = $request->route()->getAction();
        $permission = isset($action['as']) ? $action['as'] : '';

        if (!app('Illuminate\Contracts\Auth\Guard')->guest()) {
            if ($request->user()->can($permission)) {
                return $next($request);
            }
        }

        return $request->ajax() ? response('Unauthorized.', 401) : redirect('/');

//        foreach (Auth::user()->roles as $role) {
//            if ($role->title == 'admin') {
//                return $next($request);
//            }
//        }
//
//        return redirect('/');
    }
}
