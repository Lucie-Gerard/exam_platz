<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    // 27b. Definition of the relationship => User has many resources
    public function resources()
    {
        return $this->hasMany(Resource::class, 'user_id', 'id');
    }


    // 28a. Definition of the relationship => User has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
