<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'image',
        'short_content',
        'content',
        'views',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
