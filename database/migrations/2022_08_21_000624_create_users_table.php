<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_uid');
            $table->unsignedBigInteger('group_uid');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_password');
            $table->string('user_mobile');
            $table->integer('user_statis');
            $table->integer('is_deleted');
            $table->integer('user_verified_code');
            
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
};
