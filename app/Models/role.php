<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;
use App\Models\RoleUser;

class role extends Model
{
    use HasFactory;

    public function users()
    {   
       return $this->belongsToMany(User::class,'role_user','user_id','role_id')->using(RoleUser::class);
    }

    // public function usersroles()
    // {
    //    return $this->belongsToMany(UserRole::class);
    // }
}
