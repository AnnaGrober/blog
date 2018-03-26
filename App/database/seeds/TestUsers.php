<?php

use Illuminate\Database\Seeder;

class TestUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                ['id'=>'1',
                    'login'=>'Tanya',
                    'email'=>'tanya@yandex.ru',
                    'password'=>bcrypt('123123'),
                    'about'=>'Упоротый переводчик.Люблю котят и покушать',
                    'photo'=>'img/grey.jpg',
                    'rating'=>5,
                    'admin'=>null,
                ],
                ['id'=>'2',
                    'login'=>'Admin',
                    'email'=>'root@yandex.ru',
                    'password'=>bcrypt('rootroot'),
                    'about'=>null,
                    'photo'=>null,
                    'rating'=>null,
                    'admin'=>1,
                ],
                ['id'=>'3',
                    'login'=>'Anya',
                    'email'=>'anya@yandex.ru',
                    'password'=>bcrypt('456456'),
                    'about'=>'Упоротый переводчик.Люблю котят и покушать',
                    'photo'=>'img/grey.jpg',
                    'rating'=>5,
                    'admin'=>null,
                ],
                ['id'=>'4',
                    'login'=>'Nastya',
                    'email'=>'nastya@yandex.ru',
                    'password'=>bcrypt('789789'),
                    'about'=>'Упоротый переводчик.Люблю котят и покушать',
                    'photo'=>'img/grey.jpg',
                    'rating'=>5,
                    'admin'=>null,
                ],
            )
        );
    }
}
