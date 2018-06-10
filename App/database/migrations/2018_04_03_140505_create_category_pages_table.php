<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Advents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_category')->unsigned()->index();
            $table->integer('language')->unsigned()->index();
            $table->integer('language_translation')->unsigned()->index();
            $table->integer('price')->nullable();
            $table->integer('complexity')->nullable();
            $table->date('date_start');
            $table->date('date_finish');
            $table->text('ad')->nullable();
            $table->text('great_announcement')->nullable();
            $table->string('img',50)->nullable();
            $table->integer('user')->unsigned()->index();
            $table->string('link',255)->nullable();
            $table->integer('status')->nullable();
            $table->boolean('extra')->nullable();
            $table->timestamps();

            $table->foreign('type_category')
                ->references('id')->on('Categories');

            $table->foreign('language')
                ->references('id')->on('Languages');

            $table->foreign('language_translation')
                ->references('id')->on('Languages');

            $table->foreign('user')
                ->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Advents');
    }
}
