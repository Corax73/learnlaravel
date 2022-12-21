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
      'title' =>'Product_'.$i,
	  'price'=>rand(200, 1500),
	  'instock'=>1,
	  'description'=>str::random(10),
      'category_id' =>rand(1, 3)
      ]);
	}
    }
	

}
?>