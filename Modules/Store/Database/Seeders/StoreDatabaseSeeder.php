<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Store\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Modules\Store\Entities\ProductAttributes;
use Modules\Store\Entities\ProductBundle;

class StoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productBundles = ProductBundle::factory(60)->create([
            'p_type' => "complex"
        ]);
      

        foreach(['color' => ['blue' , 'red' , 'green'] , 'size' => ['large' , 'x-large' , 'xx-large']] as $attribute => $values){
            foreach($values as $value){
                ProductAttributes::create([
                    'name' => $attribute,
                    'value' => $value,
                ]);
            }
        }

        $productBundles->each(function($pb){
            $products = Product::factory(rand(2 , 3))->create([
                'p_bundle_id' => $pb->id
            ]);

            $products->each(function ($product) {
                $product->attributes()->attach(ProductAttributes::inRandomOrder()->take(3)->pluck('id'));
            });
        });
        
    }
}
