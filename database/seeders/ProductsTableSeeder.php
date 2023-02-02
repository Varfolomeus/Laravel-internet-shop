<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'iPhone X 64GB',
                'code' => 'iphone_x_64',
                'description' => 'Відмінний багатофункціональний телефон з пам\'яттю на 64 GB',
                'image' => 'products/Eok16a4kVaIqJfYLXoVAKwrcMkIYG2R20DcN5Dh9.jpg',
                'price' => 48000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone X 256GB',
                'code' => 'iphone_x_256',
                'description' => 'Відмінний багатофункціональний телефон з пам\'яттю на 256 GB',
                'image' => 'products/Km7VBfySdoUdMIF94LhUcsdfZIDvUoSKCZozioHQ.jpg',
                'price' => 60000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 1,
                'name' => 'HTC One S',
                'code' => 'htc_one_s',
                'description' => 'Навіщо платити за більше? Легендарний HTC One S',
                'image' => 'products/5EktOPyTCSMUtNdsiEdO20EC6EaQRq6sEeYFG0Cg.png',
                'price' => 4490,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 1,
                'name' => 'iPhone 5SE',
                'code' => 'iphone_5se',
                'description' => 'Відмінний класичний iPhone',
                'image' => 'products/vydQvFo7dZgenXYyYhPPdoBbSyyuzvg1usw36wsX.jpg',
                'price' => 11221,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Навушники Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Відмінне звучання від Dr. Dre',
                'image' => 'products/xAFhH51C73ByVlbIvnkMt38PI0nBGMluOhuX76LN.jpg',
                'price' => 15000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Камера GoPro',
                'code' => 'gopro',
                'description' => 'Знімайте найяскравіші моменти за допомогою цієї камери',
                'image' => 'products/vbZEZrbRRKlx0ZO2roJdT0I1WtKctUViSXDjRbV6.jpg',
                'price' => 12000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Камера Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серйозної відеозйомки потрібна серйозна камера. Panasonic HC-V770 для цих цілей найкращий вибір!',
                'image' => 'products/4QUaQiNPcQm2cj1auMoZpm6e80C2aQqliBV2Q5c9.jpg',
                'price' => 14000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 4,
                'name' => 'Кофемашина DeLongi',
                'code' => 'delongi',
                'description' => 'Гарний ранок починається з гарної кави!',
                'image' => 'products/eoKzvnxHODhej5hHWKZ5RR1WkjCGIagXKMvW32tU.jpg',
                'price' => 25200,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'Холодильник Haier',
                'code' => 'haier',
                'description' => 'Для великої родини великий холодильник!',
                'image' => 'products/EcilRWbkCRydrSuIkajXibyzfjTMEY6g8HZ2ovMa.jpg',
                'price' => 35000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'Блендер Moulinex',
                'code' => 'moulinex',
                'description' => 'Для найсміливіших ідей',
                'image' => 'products/sDithcJ5VBD99cFtZgnfspNHgug7BVCuoW0KjyGt.jpg',
                'price' => 2500,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'М\'ясорубка Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашні котлети? Вам безперечно варто подивитися на цю м\'ясорубку!',
                'image' => 'products/IPtiqEDTVsikwuxoDrLmLyPl3WUmNTKGbavqSEpl.jpg',
                'price' => 7000,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 5,
                'name' => 'Радіоприймач Golon',
                'code' => 'golon1',
                'description' => 'Всехвильовий радіоприймач Golon – працює від вбудованих акумуляторів, приймає та очищує сигнал від шумів звучить гучно та якісно.',
                'image' => 'products/JaeBDFjXXPdPxyakd5vn4Fzu1YD2p5TGhKZRVwDl.webp',
                'price' => 500,
                'count' => rand(0, 10),
            ],
        ]);
    }
}
