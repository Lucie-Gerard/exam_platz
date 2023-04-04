<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    // 26a. I establish the relationship => Category has many resources
    public function resources()
    {
        return $this->hasMany(Resource::class, 'category_id', 'id');
    }
}
