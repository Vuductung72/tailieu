<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_blog_id', 'name', 'content', 'description', 'slug', 'image', 'keyword', 'position', 'propose'
    ];

    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
