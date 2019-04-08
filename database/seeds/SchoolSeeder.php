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
        	$all_product_ids = App\Product::pluck('id')->toArray();        	
        	shuffle($all_product_ids);
        	$product_ids = array_slice($all_product_ids, 0, rand(1, count($all_product_ids)));

        	$school->products()->sync($product_ids);
	    });
    }
}
