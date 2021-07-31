<?php

namespace App\Http\Middleware;

use Response;
use Closure;
use Auth;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\RolePermission;
use App\Models\Item;
use App\Models\Permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param \App\Models\Item $Item_name

     * @return mixed
     */
    public function handle(Request $request, Closure $next,$Item_name,$Permission)
    

    {
        $RoleUser = RoleUser::where('user_id','=',Auth::id())->select('user_id','role_id')->get();
        $AssignedRole = $RoleUser->pluck('role_id');
        $Item = Item::where('name',$Item_name)->first();
        $permission_arr = RolePermission::
                                  where('role_id',$AssignedRole)
                                ->where('Item_id',$Item->id)
                                ->pluck('permission_id')
                                ->toArray();  
        if ($Item == null) {
            abort(404);
        }                       
        if (empty($permission_arr)) {
             abort(403);
        }                        
        if (!$this->check_permission($permission_arr, $Permission)) {
            abort(404);
        } 
          else 
        {
            return $next($request);
        }
    }

   protected function check_permission($permission_arr,$Permission)
   {
            $permission_id = Permission::where('name', $Permission)->first()->id ?? null;
            return in_array($permission_id, $permission_arr);
   }
}
