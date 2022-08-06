<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'meta_title',
        'description',
        'meta_description',
        'category_id',
        'sub_category_id',
        'date',
        'image',
        'author_id',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function sub_category()
    {
        return $this->hasOne(Sub_category::class, 'id', 'sub_category_id');
    }

}
