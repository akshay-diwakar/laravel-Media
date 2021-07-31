<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment','user_id','post_id'];

    public function Posts()
    {
        return $this->belongsTo(Posts::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
