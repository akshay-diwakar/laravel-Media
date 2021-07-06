<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\role;

class RolePermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'Item',
        'Permission',
    ];


    public function roles()
    {
        return $this->belongsTo(role::class,'role_id','id');
    }

}
