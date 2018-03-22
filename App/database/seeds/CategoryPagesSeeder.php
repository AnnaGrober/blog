<?php

use Illuminate\Database\Seeder;

class CategoryPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
        DB::table('categorypages')->insert(
        	array(
				[
					'id'=>"1",
					'category' =>"1",
					'language'=>"2",
					'priceMin'=>"0",
					'priceMax'=>"200",
					'complexity'=>"4",
					'ad'=>"Переведите пожалуйста",
					'categoryPages'=>"перевод перевод перевод",
                    'img'=>"krol.jpg",
                    'user'=>"1"

				],
                [
                'id'=>"2",
                'category' =>"3",
                'language'=>"2",
                'priceMin'=>"0",
                'priceMax'=>"200",
                'complexity'=>"4",
                'ad'=>"Переведите пожалуйста",
                'categoryPages'=>"перевод 666 перевод перевод",
                'img'=>"dog.jpg",
                'user'=>"2"

				]
				
			)
        );
    }
}
