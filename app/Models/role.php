<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoleUser;
use App\Models\RolePermsission;
use App\Models\Item_permission_role;
use App\Models\Item;

class role extends Model
{
    use HasFactory;

    protected $fillable = [
       'name'
    ];


    public function users()
    {   
       return $this->belongsToMany(User::class,'role_user','user_id','role_id')->using(RoleUser::class);
    }

    
    public function items()
    {
      return $this->belongsToMany(Item::class,'role_permissions','role_id','Item_id')->using(Item_permission_role::class);
    }

    public function permissions()
    {
       return $this->belongsToMany(role::class,'role_permissions');
    }

}
