<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_posts', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('invoice_id')->unsigned()->nullable(); 
            $table->string('video')->nullable();
            $table->bigInteger('postable_id')->nullable();
            $table->string('postable_type')->nullable();
            $table->date('date');
            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('invoice_posts');
    }
}
