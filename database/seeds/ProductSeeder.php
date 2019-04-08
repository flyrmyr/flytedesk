<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach(['Full Page Ad', 'Half Page Ad', 'Quarter Page Ad', 'Eighth Page Ad'] as $name) {
    		Product::create([
    			'name' => $name,
    			'price' => rand(100,1000) * 100
    		]);
    	}
    }
}
