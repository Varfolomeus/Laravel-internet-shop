<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Администратор',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
                'is_admin' => 1,
            ],
            [
                'name' => 'Bread Pit',
                'email' => 'pit@iiii.io',
                'password' => bcrypt('pit@iiii.io'),
                'is_admin' => 1,
            ],
            [
                'name' => 'qqq qqq',
                'email' => 'qqq@qqq.io',
                'password' => bcrypt('qqq@qqq.io'),
                'is_admin' => 0,
            ],
            [
                'name' => 'fff fff',
                'email' => 'fff@fff.io',
                'password' => bcrypt('fff@fff.io'),
                'is_admin' => 0,
            ],
            [
                'name' => 'ttt ttt',
                'email' => 'ttt@ttt.io',
                'password' => bcrypt('ttt@ttt.io'),
                'is_admin' => 0,
            ],
        ]);
    }
}
