<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Store\Entities\ProductBundle;
use Illuminate\Contracts\Support\Renderable;

class ProductController extends Controller
{
    /**
     * return the json of product
     */
    public function showProduct(ProductBundle $ProductBundle){
        $ProductBundle->load('products.attributes');
        return $ProductBundle;
    }
}
