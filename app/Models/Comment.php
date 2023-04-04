<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LDAP\Result;

class Comment extends Model
{

    public $timestamps = FALSE;
    
    use HasFactory;

    // 28b. Definition of the relationship => Comments belong to users
    public function users()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    // 28c. Definition of the relationship => Comments belong to resources
    public function resources()
    {
       return $this->belongsTo(Resource::class, 'resource_id');
    }
}
