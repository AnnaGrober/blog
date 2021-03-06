<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Languages', function (Blueprint $table) {
        $table->increments('id');
        $table->string('language');
        $table->timestamps();
    });
    }


    public function down()
    {
        Schema::dropIfExists('Languages');
    }
}
