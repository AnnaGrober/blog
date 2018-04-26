<?php

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Feedbacks')->insert(
            array(
                [
                    'application' =>"2",
                    'user' => "3"
                ],
            )
        );
    }
}
