<?php

use Illuminate\Database\Seeder;

class AdventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
        DB::table('Advents')->insert(
        	array(
				[
					'type_category' =>"1",
					'language'=>"2",
                    'language_translation'=>"2",
					'price'=>"0",
					'complexity'=>"4",
                    'date_start'=>"2018-04-02",
                    'date_finish'=>"2018-04-02",
					'ad'=>"Переведите пожалуйста",
					'great_announcement'=>"перевод перевод перевод",
                    'img'=>"krol.jpg",
                    'user'=>"1",
                    'link'=>"http://ilibrary.ru/text/436/p.2/index.html",
                    'extra'=>"0"
				],
                [
                    'type_category' =>"4",
                    'language'=>"2",
                    'language_translation'=>"3",
                    'price'=>"199",
                    'complexity'=>"4",
                    'date_start'=>"2018-04-02",
                    'date_finish'=>"2018-04-02",
                    'ad'=>"Переведите пожалуйста перевод",
                    'great_announcement'=>"перевод перевод перевод переведите",
                    'img'=>"dog.jpg",
                    'user'=>"2",
                    'link'=>"http://ilibrary.ru/text/436/p.2/index.html",
                    'extra'=>"1"
				]
				
			)
        );
    }
}
