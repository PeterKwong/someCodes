<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJewelleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jewelleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock');
            $table->string('gemstone')->default(0);
            $table->string('type');
            $table->string('metal');
            $table->boolean('setting')->default(0);
            $table->string('sideStone')->default(0);
            $table->float('ct')->default(0);
            $table->string('video')->nullable();
            $table->integer('unit_price');
            $table->boolean('customized')->default(0);
            $table->boolean('published')->default(0);
            $table->timestamps();
        });

        Schema::create('invoice_jewellery', function (Blueprint $table) {
            $table->integer('invoice_id');
            $table->integer('jewellery_id');            
            $table->primary(['invoice_id','jewellery_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jewelleries');
        Schema::dropIfExists('invoice_jewellery');
    }
}
