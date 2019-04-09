<?php

use Illuminate\Database\Seeder;
use App\School;
use App\Product;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\School::class, rand(100, 200))->create()->each(function ($school) {
        	// Get a random set of Product ids
        	$all_product_names = Product::$standardList;        	
        	shuffle($all_product_names);
        	$product_names = array_slice($all_product_names, 0, rand(1, count($all_product_names)));

            foreach($product_names as $name) {
                $school->products()->save(new Product([
                    'name' => $name,
                    'price' => rand(1000, 100000)
                ]));
            }
	    });
    }
}
