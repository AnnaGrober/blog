<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forums')->insert(
            array(
                [
                    'subject' =>"2",
                    'message'=>"Hello",
                    'user'=>"6"
                ],
                [
                    'subject' =>"1",
                    'message'=>"Hello world",
                    'user'=>"1"
                ]
            )
        );
    }
}
