<?php

namespace Modules\Blog\Entities;

use Modules\Blog\Entities\Tag;
use Modules\Blog\Entities\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'description', 'slug', 'user_id', 'special'];
    protected $hidden = ['pivot'];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\ArticleFactory::new();
    }
}
