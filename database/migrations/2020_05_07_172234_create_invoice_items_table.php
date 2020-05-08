<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('invoice_id')->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
}
