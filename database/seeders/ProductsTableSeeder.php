<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
    for ($i=1; $i<11; $i++) {
	   \Illuminate\Support\Facades\DB::table('products')->insert([
      'descr' => str::random(10),
      ]);
	}
	}
	

}
?>