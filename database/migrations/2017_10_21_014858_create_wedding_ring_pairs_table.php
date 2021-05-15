<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddingRingPairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_ring_pairs', function (Blueprint $table) {
            $table->id('id');
            $table->integer('unit_price');
            $table->string('video')->nullable();
            $table->string('video360')->nullable();
            $table->boolean('published')->default(false);
            $table->integer('page_id')->unsigned()->nullable();
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
        Schema::dropIfExists('wedding_ring_pairs');
    }
}
