<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $data = [
                [
                    'email' => 'dinhman2@gmail.com',
                    'password'=> bcrypt('1234567'),
                    'level'=> 1
                ], [
                    'email' => 'admin@gmail.com',
                    'password'=> bcrypt('1234567'),
                    'level'=> 1
                ],
                ];
            DB::table('table_users')->insert($data);
    }
}