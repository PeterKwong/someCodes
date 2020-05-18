<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('invoice_id')->nullable();
            $table->string('title');
            $table->date('date');
            $table->date('due_date')->nullable();
            $table->integer('discount');
            $table->integer('extra');
            $table->integer('sub_total');
            $table->integer('deposit');
            $table->string('deposit_method')->default('visa');
            $table->integer('balance');
            $table->string('balance_method')->default('visa');
            $table->integer('total');
            $table->string('finalize_code')->default(Str::random('60'));
            $table->string('coupon_code')->nullable();
            $table->string('notes')->nullable();
            $table->string('status')->default('ordering');
            $table->string('customer_stripe')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('referral')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
