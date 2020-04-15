<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiamondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamonds', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('price');
            $table->string('shape');
            $table->decimal('weight',6,2);
            $table->string('color');
            $table->string('clarity');
            $table->string('cut')->default(0)->nullable();
            $table->string('polish');
            $table->string('symmetry');
            $table->string('fluorescence')->default('None');
            $table->bigInteger('certificate'); 
            $table->string('lab')->default('gia');           
            $table->string('stock')->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('length')->unsigned()->nullable();
            $table->integer('width')->unsigned()->nullable();
            $table->integer('height')->unsigned()->nullable();
            $table->integer('table')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();
            $table->integer('table_angle')->unsigned()->nullable();
            $table->integer('parvilion_angle')->unsigned()->nullable();
            $table->string('location')->nullable();
            $table->boolean('has_image')->nullable();
            $table->boolean('has_cert')->nullable();
            $table->boolean('has_video')->nullable();
            $table->boolean('cert_cache')->nullable();
            $table->boolean('image_cache')->nullable();
            $table->boolean('video_cache')->nullable();         
            $table->boolean('plot')->nullable();         
            $table->text('image_link')->nullable();
            $table->text('cert_link')->nullable();
            $table->text('video_link')->nullable();
            $table->boolean('available')->default(NULL)->nullable();
            $table->bigInteger('r_id')->nullable(); 
            $table->string('milky')->default('None');
            $table->timestamps();
            // $table->index(['available']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diamonds');
    }
}
