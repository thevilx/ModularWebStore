<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
