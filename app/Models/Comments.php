<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    
    protected $fillable = ['comment','user_id'];

    public function Posts()
    {
        return $this->belongsTo(Posts::class);
    }

}

