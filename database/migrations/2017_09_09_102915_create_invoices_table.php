<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('invoice_no')->nullable();
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
            $table->string('notes')->nullable();
            $table->integer('account_balance')->nullable()->default(0);
            $table->integer('account_total')->nullable()->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
