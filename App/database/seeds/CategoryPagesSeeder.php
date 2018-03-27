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
					'type_category' =>"1",
					'language'=>"2",
					'priceMin'=>"0",
					'priceMax'=>"200",
					'complexity'=>"4",
					'ad'=>"Переведите пожалуйста",
					'categoryPages'=>"перевод перевод перевод",
                    'img'=>"krol.jpg",
                    'user'=>"1",
                    'link'=>"http://ilibrary.ru/text/436/p.2/index.html",
                    'language_translation'=>"2"
				],
                [
                'id'=>"2",
                'type_category' =>"3",
                'language'=>"2",
                'priceMin'=>"0",
                'priceMax'=>"200",
                'complexity'=>"4",
                'ad'=>"Переведите пожалуйста",
                'categoryPages'=>"перевод 666 перевод перевод",
                'img'=>"dog.jpg",
                'user'=>"2",
                    'link'=>"http://www.stihi-rus.ru/1/Ahmatova/86.htm",
                    'language_translation'=>"1"

				]
				
			)
        );
    }
}
