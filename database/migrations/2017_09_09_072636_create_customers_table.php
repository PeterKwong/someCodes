<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->biginteger('phone')->unique();
            $table->string('wechat')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->integer('user_id')->nullable();
            $table->bigInteger('coupon_id')->nullable();        
            $table->bigInteger('stripe_id')->nullable();        
            $table->integer('stripe_active')->default(false);        
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
        Schema::dropIfExists('customers');
    }
}
