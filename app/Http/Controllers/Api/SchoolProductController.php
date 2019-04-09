<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ProductTransformer;
use App\School;
use App\Product;

class SchoolProductController extends Controller
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

    public function create(School $school)
    {
    	// Validate input
    	$input = request()->validate([
	        'name' => ['required', 'in:'.implode(Product::$standardList, ',')],
	        'price' => 'required|numeric|min:1',
	    ]);

    	$product = $school->products()->save(new Product([
    		'name' => $input['name'],
    		'price' => $input['price']
    	]));

    	return $this->show($school, $product);
    }

    public function show(School $school, Product $product)
    {
        // Ensure product belongs to school in question
        $product = $school->products()->findOrFail($product->id);

    	return fractal()
		   ->item($product)
		   ->transformWith(new ProductTransformer())
		   ->respond();
    }

    public function update(School $school, Product $product)
    {
    	// Validate input
    	$input = request()->validate([
	        'price' => 'numeric|min:1',
	    ]);

        // Ensure product belongs to school in question
        $product = $school->products()->findOrFail($product->id);

    	// Update attributes if passed
    	if(isset($input['price'])) {
    		$product->price = $input['price'];
    	}

    	// Save if attributes changed
    	if($product->isDirty()) {
    		$product->save();
    	}

    	return $this->show($school, $product);
    }

    public function delete(School $school, Product $product)
    {
        // Ensure product belongs to school in question
        $product = $school->products()->findOrFail($product->id);

    	$product->delete();

    	return json_encode(true);
    }
}
