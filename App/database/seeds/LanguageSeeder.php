<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert(
        	array(
				[
					'id'=>"1",
					'language' =>"Японский"
				],
				[
					'id'=>"2",
					'language' =>"Турецкий"
				],
				[
					'id'=>"3",
					'language' =>"Испанский"
				],
				[
					'id'=>"4",
					'language' =>"Французский"
				]
			)
        );
    }
}
