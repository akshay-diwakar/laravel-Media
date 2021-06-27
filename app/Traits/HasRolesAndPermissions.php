<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRoleAndPermissions{

    /**
     * @return mixed
     */
    
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }   

    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

            /**
         * @param $permission
         * @return bool
         */
        protected function hasPermission($permission)
        {
            return (bool) $this->permissions->where('slug', $permission->slug)->count();
        }

        /**
         * @param $permission
         * @return bool
         */
        protected function hasPermissionTo($permission)
        {
            return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        }

                /**
         * @param $permission
         * @return bool
         */
        public function hasPermissionThroughRole($permission)
        {
            foreach ($permission->roles as $role){
                if($this->roles->contains($role)) {
                    return true;
                }
            }
            return false;
        }

}