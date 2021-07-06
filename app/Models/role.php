<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoleUser;
use App\Models\RolePermsission;

class role extends Model
{
    use HasFactory;

    public function users()
    {   
       return $this->belongsToMany(User::class,'role_user','user_id','role_id')->using(RoleUser::class);
    }

    public function rolespermsission()
    {
       return $this->hasMany(RolePermission::class,'role_id');
    }
}
