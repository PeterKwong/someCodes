<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password', 60)->nullable();
            $table->string('api_token', 60)->unique();
            $table->string('email_token', 60)->nullable();
            $table->string('image_url')->nullable();
            $table->string('provider')->default('email');
            $table->string('provider_id')->nullable();
            $table->bigInteger('coupon_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
