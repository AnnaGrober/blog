<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCategoryPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoryPages', function (Blueprint $table) {
            $table->dropColumn('priceMax');
            $table->boolean('status')->default(FALSE);
            $table->renameColumn('priceMin', 'price');
            $table->renameColumn('dateStart', 'date_start');
            $table->renameColumn('dateFinish', 'date_finish');
            $table->renameColumn('categoryPages', 'category_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoryPages', function (Blueprint $table) {
            //
        });
    }
}
