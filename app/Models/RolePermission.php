<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'Item',
        'permission',
    ];

    // protected $casts = [
    //     'Item' => 'array',
    //     'permission' => 'array'
    // ];
    
}
