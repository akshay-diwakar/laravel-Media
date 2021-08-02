<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use App\Models\Comments;
use App\Models\role;
use App\Models\RoleUser;
use App\Models\RolePermission;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Post()
    {
        return $this->hasmany(Post::class);
    }

    public function Comment()
    {
        return $this->hasmany(Comments::class);
    }

    public function roles()
    {
         return $this->belongsToMany(role::class,'role_user','role_id','user_id')->using(RoleUser::class);
    }
       

    /*public function rolepermission()
    {
        return $this->hasOne(RolePermission::class);
    }*/


    

}
