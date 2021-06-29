<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;
use App\Models\UserRole;

class role extends Model
{
    use HasFactory;

    public function users()
    {   
       return $this->belongsToMany(User::class,'users_roles','user_id','role_id')->using(UserRole::class);
    }

    // public function usersroles()
    // {
    //    return $this->belongsToMany(UserRole::class);
    // }
}
