<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'category_id',
    ];

    /**
     * العلاقة مع الفئة (Category)
     */
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
