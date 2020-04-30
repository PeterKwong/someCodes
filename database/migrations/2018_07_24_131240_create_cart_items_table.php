<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id');
            $table->integer('order_id')->nullable();
            $table->integer('pair_item_id');
            $table->integer('cart_itemable_id');
            $table->string('cart_itemable_type');
            $table->string('title');
            $table->integer('unit_price');
            $table->string('image');
            $table->integer('ring_size')->nullable();
            $table->string('engrave')->nullable();
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
        Schema::dropIfExists('cart_items');
    }
}
