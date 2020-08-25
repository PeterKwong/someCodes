<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngagementRingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engagement_rings', function (Blueprint $table) {
            $table->id('id');
            $table->string('stock');
            $table->string('prong')->default('4-prong');
            $table->string('shoulder')->default('tapering');
            $table->string('style')->default('solitaire');
            $table->string('video')->nullable();
            $table->string('video360')->nullable();
            $table->integer('unit_price');
            $table->string('metal')->default('18KW')->nullable();
            $table->float('metal_weight')->default(0)->nullable();
            $table->float('ct')->default(0)->nullable();
            $table->integer('cost')->default(0)->nullable();
            $table->string('brand')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('customized')->default(false);
            $table->bigInteger('page_id')->unsigned()->nullable();
            $table->timestamps();
        });


        Schema::create('engagement_ring_invoice', function (Blueprint $table) {
            $table->bigInteger('invoice_id');
            $table->bigInteger('engagement_ring_id');            
            $table->primary(['invoice_id','engagement_ring_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engagement_rings');
        Schema::dropIfExists('engagement_ring_invoice');
    }
}
