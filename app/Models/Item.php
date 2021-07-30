<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item_permission_role;
use App\Models\role;	
use App\Models\Permission;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

     public function roles()
     {
         return $this->belongsToMany(role::class,'role_permissions','role_id','Item_id')->using(Item_permission_role::class);
    }

    public function Permissions()
    {
    	return $this->belongsToMany(Permission::class,'role_permissions','Item_id','permission_id')
                       ->using(Item_permission_role::class);
    }
}

    // https://medium.com/@afrazahmad090/laravel-many-to-many-relationship-explained-822b554c1973