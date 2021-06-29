<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\role;

class UserRole extends  Pivot
{
    use HasFactory;
    
    public function users()
    {
       return $this->belongsToMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(role::class);
    }

}
