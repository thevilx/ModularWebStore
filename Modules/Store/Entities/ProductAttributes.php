<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttributes extends Model
{
    use HasFactory;
    protected $table = "productAttributes";
    public $timestamps = false;
    
    protected $fillable = [];

    public function attribute()
    {
        return $this->belongsToMany(ProductAttributes::class, 'attribute_product');
    }
   
    protected static function newFactory()
    {
        return \Modules\Store\Database\factories\ProductAttributesFactory::new();
    }
}
