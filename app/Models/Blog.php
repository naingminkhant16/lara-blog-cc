<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['title', 'intro', 'body'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%" . $search . "%")
                    ->orWhere('body', 'LIKE', "%" . $search . "%");
            });
        });
        // $query->dd();

        $query->when($filter['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        // $query->dd();

        $query->when($filter['username'] ?? false, function ($query, $username) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('name', $username);
            });
        });
        // $query->dd();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
