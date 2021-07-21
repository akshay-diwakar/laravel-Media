<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\role;
use App\Models\User;

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
}
