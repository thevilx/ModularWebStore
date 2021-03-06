<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModelHasPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentables', function (Blueprint $table) {
            $table->unsignedBigInteger("payment_id");
            $table->foreign("payment_id")->references('id')->on('payments')->cascadeOnDelete();
            $table->unsignedBigInteger("paymentable_id");
            $table->string("paymentable_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paymentables');
    }
}
