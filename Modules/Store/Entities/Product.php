<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    public function productBundle(){
        return $this->belongsTo(ProductBundle::class , 'p_bundle_id');
    }

    public function attributes(){
        return $this->belongsToMany(ProductAttributes::class , 'attribute_product' , 'product_id' , 'attribute_id' );
    }

    protected static function newFactory()
    {
        return \Modules\Store\Database\factories\ProductFactory::new();
    }
}
