<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = ['file_name', 'file_path', 'uploaded_by', 'uploaded_at'];

    public function article()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
