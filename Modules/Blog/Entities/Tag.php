<?php

namespace Modules\Blog\Entities;

use Modules\Blog\Entities\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $hidden = ['pivot'];

    public function articles(){
        return $this->belongsToMany(Article::class);
    }

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\TagFactory::new();
    }
}
