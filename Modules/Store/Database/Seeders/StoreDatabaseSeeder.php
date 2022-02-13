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
        ProductBundle::factory(60)->create();
      

        foreach(['color' => ['blue' , 'red' , 'green'] , 'size' => ['large' , 'x-large' , 'xx-large']] as $attribute => $values){
            foreach($values as $value){
                ProductAttributes::create([
                    'name' => $attribute,
                    'value' => $value,
                ]);
            }
        }

        $products = Product::factory(60)->create();

        $products->each(function($product){

            $product->attributes()
                    ->attach(
                        [
                            ProductAttributes::inRandomOrder()->first()->id,
                            ProductAttributes::inRandomOrder()->first()->id
                        ]
                    );

        });

 
    }
}
