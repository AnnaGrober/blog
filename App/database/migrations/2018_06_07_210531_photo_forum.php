<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhotoForum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Photo_for_forums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->integer('message')->unsigned()->index();
            $table->timestamps();

            $table->foreign('message')
                ->references('id')->on('Forum_messages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Photo_for_forums');
    }
}
