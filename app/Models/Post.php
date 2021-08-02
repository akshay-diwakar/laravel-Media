<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title',
        'description',
        'Image',
        'user_id',
    ];
    
    public function comments()
    {
        return $this->hasMany(Comments::class,'posts_id');
    }


    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
