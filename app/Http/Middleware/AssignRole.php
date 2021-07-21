<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Models\role;
use App\Models\Item;
use App\Models\Permission;


class AssignRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $RolePermission = RolePermission::get();
        $Item = Item::get();
        $Permission =  Permission::get();



        if (auth()->user()->roles() == 'admin') {
            
            
            return $next($request);
        }
        return dd(auth()->user()->rolepermission());
    }
}



// Not that decided 
// You need to pass the item name and desire permission name.
// Role will be get it from user login