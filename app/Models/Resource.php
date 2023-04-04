<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Resource extends Model
{
    use HasFactory;

    // 35. So the data can be inserted in the DB (mass assignments)
    protected $fillable = ['title', 'description', 'user_id', 'category_id', 'image', 'size'];

    // 26b. Definition of the relationship => Resources belong to categories
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // 27a. Definition of the relationship => Resources belong to users
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 28d. Definition of the relationship => Resource has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'resource_id', 'id');
    }

    // 24a. I create a function that will filter my categories
    public function scopeFilter($query, array $filters)
    {
        // 24c. Let's check that I get the category
        // dd($filters['category']);

        //25a. if it's not false, move on
        if ($filters['category'] ?? false) {
            // 25b. Search for whatever the category is in the name column
            $resources = Resource::whereHas('categories', function (Builder $query) {
                $query->where('name', 'like', '%' . request('category') . '%');
            });
            return $resources;
        }

        if ($filters['search'] ?? false) {
            // 29a. Search for whatever the category, the title or description is in the name column/ resources table
            $resources = Resource::whereHas('categories', function (Builder $query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%')
                    ->orWhere('name', 'like', '%' . request('search') . '%');
            });
            return $resources;
        }

        return $query;
    }
}




// The null-coalescing operator ?? returns the value of its left-hand operand if it isn't null; 
// otherwise, it evaluates the right-hand operand and returns its result. The ?? operator doesn't 
// evaluate its right-hand operand if the left-hand operand evaluates to non-null.