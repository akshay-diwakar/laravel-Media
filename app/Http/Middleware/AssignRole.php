<?php

namespace App\Http\Middleware;

use DB;
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
        


        // $CurrentUser = DB::table('role_user')
        //                                     ->where('user_id','=', Auth::id())
        //                                     ->select('role_user.user_id','role_user.role_id')
        //                                     ->get();
        
        // $rolename = $CurrentUser->pluck('role_id');
        //  // dd(intval($rolename));
        //   // dd($rolename);                                          
        // $role_permissions = DB::table('role_permissions')
        //                       ->where('role_permissions.role_id',$rolename)
        //                       ->select('role_permissions.Item_id','role_permissions.role_id','role_permissions.permission_id')
        //                       ->get();  

        //   // dd($role_permissions);

        //   $role_id = $role_permissions->pluck('role_id');
        //   $Item_id = $role_permissions->pluck('Item_id');
        //   $permission_id = $role_permissions->pluck('permission_id');

        //   // dd($role_id);

        //    // dd($Item_id);
        //    // dd($permission_id);                   
        //   if (Auth::user()->roles->first()->id == $role_id[0]) {
        //        if ($Item_id='3' && $Item_id ='4') {
        //               if ($permission_id='3' && $permission_id='4') {
        //                     return $next($request);
        //               }
                      
        //        }
               
        //   }












        // $user = Auth::user();
        // // $userrole = $user->role;


        // if (Auth::user()->roles()) {
        //     foreach($roles as $role) {
        //      // Check if user has the role This check will depend on how your roles are set up
        //       if(Auth::user()->roles())
        //     }
        // }
        /*return $next($request);*/
        // abort(423, 'Sorry you are not authrized !'); 
    }
}



// Not that decided 
// You need to pass the item name and desire permission name.
// Role will be get it from user login