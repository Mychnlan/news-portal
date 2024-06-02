<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'author_id',
        'category_id',
        'published_at',
        'status',
    ];
    // Relasi ke tabel users (author)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi ke tabel categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
