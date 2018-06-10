<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumMes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject')->unsigned()->index();
            $table->string('message')->nullable();
            $table->integer('user')->unsigned()->index();;
            $table->timestamps();

            $table->foreign('subject')
                ->references('id')->on('Subjects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user')
                ->references('id')->on('Users')
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
        Schema::dropIfExists('forum_messages');
    }
}
