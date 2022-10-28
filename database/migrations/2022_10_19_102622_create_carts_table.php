<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('cart_id');
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->unsignedBigInteger('price');
            $table->foreign('price')->references('price')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
