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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_uid');
            $table->string('blog_title');
            $table->text('blog_description');
            $table->string('blog_img');
            $table->string('blog_meta_description');
            $table->string('key_des');
            $table->integer('is_deleted');
            $table->unsignedBigInteger('user_uid');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
