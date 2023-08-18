<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class table_category extends Seeder
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
                'name_category'=>'Iphone',
                'slug'=>Str::slug('Iphone'),
            ],
            [
                'name_category'=>'Samsung',
                'slug'=>Str::slug('Samsung'),
            ]
        ];
        DB::table('table_category')->insert($data);
    }
}
