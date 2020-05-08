<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDiamondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_diamonds', function (Blueprint $table) {
            $table->id('id');
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->string('stock');
            $table->bigInteger('certificate');
            $table->string('shape');
            $table->string('weight');
            $table->string('color');
            $table->string('clarity');
            $table->string('cut')->nullable();
            $table->string('polish');
            $table->string('symmetry');
            $table->string('fluorescence');
            $table->integer('price');
            $table->string('lab')->default('gia');
            $table->date('due_date')->nullable();
            $table->integer('account_price')->nullable()->default(0);
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
        Schema::dropIfExists('invoice_diamonds');
    }
}
