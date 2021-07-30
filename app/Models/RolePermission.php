<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\role;
use App\Models\User;
use App\Models\Item;
use App\Models\Permission;

class RolePermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'Item_id',
        'permission_id',
    ];


    public function roles()
    {
        return $this->belongsTo(role::class,'role_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsTo(Item::class,'Item_id','id');

    }

    public function permisisons()
    {
        return $this->belongsTo(Permission::class,'permission_id','id');
    }

}
