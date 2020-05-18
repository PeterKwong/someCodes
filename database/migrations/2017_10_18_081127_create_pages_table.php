<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id('id');
            $table->string('url');
            $table->bigInteger('paginable_id')->nullable(); 
            $table->string('paginable_type')->nullable();  
            $table->timestamps();
        });

        Schema::create('page_tag', function (Blueprint $table) {
            $table->primary(['page_id','tag_id']);

            $table->bigInteger('page_id');
            $table->bigInteger('tag_id');
            $table->timestamps();

            // $table->foreign('tag_id')
            //     ->references('id')
            //     ->on('tags')
            //     ->onDelete('cascade');

            // $table->foreign('page_id')
            //     ->references('id')
            //     ->on('pages')
            //     ->onDelete('cascade');
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
