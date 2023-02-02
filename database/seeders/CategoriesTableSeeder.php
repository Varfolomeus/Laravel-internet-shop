<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Мобільні телефони',
                'code' => 'mobiles',
                'description' => 'У цьому розділі ви знайдете найпопулярніші мобільні телефони за найкращими цінами!',
                'image' => 'categories/wAqwpHOG0zMbCKunDuFxZ9HuHbQoHKcNU2jLBgzz.jpg',
            ],
            [
                'name' => 'Портативна техніка',
                'code' => 'portables',
                'description' => 'У цьому розділі ви знайдете найпопулярнішу портативну техніку за відмінними цінами!',
                'image' => 'categories/6yznAyCXDMP67JuxUYVSYmTJZZU32tnxk0650HVM.jpg',
            ],
            [
                'name' => 'Побутова техніка',
                'code' => 'appliances',
                'description' => 'У цьому розділі ви знайдете найпопулярнішу побутову техніку за відмінними цінами!',
                'image' => 'categories/sL6L4j1CN6qmdAikRB7uA1n7Xc9Ud4owIpaI7lL8.jpg',
            ],
            [
                'name' => 'Інша техніка',
                'code' => 'other',
                'description' => 'У цьому розділі ви знайдете найпопулярнішу техніку та аксесуари до неї за відмінними цінами!',
                'image' => 'categories/a4E3bDINyvBj9WoIzPdrpoFwAoRbhmDYbMzHrcuu.jpg',
            ],
            [
                'name' => 'Радіоприймачі',
                'code' => 'radio',
                'description' => 'Радіоприймачі',
                'image' => 'categories/wh8HMQmdpUciSoSt3ozomIoBUcXxtGBIOlrCZMCc.webp',
            ],
            [
                'name' => 'Фены для волосся',
                'code' => 'hair_dryers',
                'description' => 'Фены для волосся',
                'image' => 'categories/Rct6iKFSiTvjQD8tLajd98eIsyWrZtCQBh6KxRGV.jpg',
            ],
        ]);
    }
}
