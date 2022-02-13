<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductBundle extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "productBundles";

    public function products(){
        return $this->hasMany(Product::class , 'p_bundle_id');
    }

    protected static function newFactory()
    {
        return \Modules\Store\Database\factories\ProductBundleFactory::new();
    }
}
