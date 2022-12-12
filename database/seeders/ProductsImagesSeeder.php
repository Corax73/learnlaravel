<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<11; $i++) {
            \Illuminate\Support\Facades\DB::table('product_images')->insert([
           'img' => 'product_'. $i . '.jpg',
           'product_id' => $i
           ]);
         }
    }
}
