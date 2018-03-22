<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
        	array(
				[
					'id'=>"1",
					'category' =>"Книга"
				],
				[
					'id'=>"2",
					'category' =>"Видео"
				],
				[
					'id'=>"3",
					'category' =>"Статья"
				],
				[
					'id'=>"4",
					'category' =>"Озвучка видео"
				]
			)
        );
    }
}
