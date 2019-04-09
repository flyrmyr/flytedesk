<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ProductTransformer;
use App\School;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school)
    {
    	return fractal()
		   ->collection($school->products)
		   ->transformWith(new ProductTransformer())
		   ->respond();
    }

    public function create()
    {
    	// Validate input
    	$input = request()->validate([
	        'name' => 'required|string|min:1',
	        'price' => 'required|numeric|min:1',
	    ]);

    	$product = Product::create([
    		'name' => $input['name'],
    		'price' => $input['price']
    	]);

    	return $this->show($product);
    }

    public function show(Product $product)
    {
    	return fractal()
		   ->item($product)
		   ->transformWith(new ProductTransformer())
		   ->respond();
    }

    public function update(Product $product)
    {
    	// Validate input
    	$input = request()->validate([
	        'price' => 'numeric|min:1',
	    ]);

    	// Update attributes if passed
    	if(isset($input['price'])) {
    		$product->price = $input['price'];
    	}

    	// Save if attributes changed
    	if($product->isDirty()) {
    		$product->save();
    	}

    	return $this->show($product);
    }

    public function delete(Product $product)
    {
    	$product->delete();

    	return json_encode(true);
    }
}
