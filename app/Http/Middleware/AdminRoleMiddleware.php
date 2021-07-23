<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\RolePermission;
use App\Models\Item;
use App\Models\Permission;

use Illuminate\Http\Request;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if ($request->user() && $request->user->roles != 'admin')
    //     {
    //         return new Response(view('unauthorized')->with('role', 'ADMIN'));
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next)
    {
        $RolePermission = RolePermission::get();
        $Item = Item::get();
        $Permission =  Permission::get();

        if (auth()->user()->roles() == 'admin') {
            
            
            return $next($request);
        }
            return $next($request);
        
    }
}
