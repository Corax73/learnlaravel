<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            \Illuminate\Support\Facades\DB::table('categories')->insert([
           'title' => 'Phones',
           'img' => 'categories'. '.jpg',
           'desc'=>str::random(10),
           'alias' => 'phones'
           ]);
           \Illuminate\Support\Facades\DB::table('categories')->insert([
           'title' => 'Cameras',
           'img' => 'avds_large'. '.jpg',
           'desc'=>str::random(10),
           'alias' => 'cameras'
           ]);
           \Illuminate\Support\Facades\DB::table('categories')->insert([
           'title' => 'Laptops',
           'img' => 'laptops'. '.jpg',
           'desc'=>str::random(10),
           'alias' => 'laptops'
           ]);
    }
}
