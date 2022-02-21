<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productBundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->enum('p_type' , ['simple' , 'complex'])->default('simple');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamps();
        });

        Schema::create('productAttributes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_bundle_id');
            $table->integer('quantity')->nullable();
            $table->decimal('price' , 12 , 0 , true);
            // $table->unsignedBigInteger('p_attribute_id');
            $table->timestamps();

            $table->foreign('p_bundle_id')->references('id')->on('productBundles')->cascadeOnDelete();
            // $table->foreign('p_attribute_id')->references('id')->on('productAttributes')->cascadeOnDelete();
        });
        
        Schema::create('attribute_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_attributes_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_attributes_id')->references('id')->on('productAttributes')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });

        // Schema::create('product_productBundle', function (Blueprint $table) {
        //     $table->unsignedBigInteger('product_id');
        //     $table->unsignedBigInteger('p_bundle_id');

        //     $table->foreign('p_bundle_id')->references('id')->on('productBundle')->cascadeOnDelete();
        //     $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        // });






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_product');
        Schema::dropIfExists('productAttributes');
        Schema::dropIfExists('products');
        Schema::dropIfExists('productBundle');

    }
}
