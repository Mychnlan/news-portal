<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $incrementing = false; // Tidak menggunakan auto-increment
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'slug',
    ];
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags', 'tag_id', 'article_id')->withTimestamps();
    }
}
