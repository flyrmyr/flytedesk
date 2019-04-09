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
    	$product = Product::create([
    		'name' => request()->get('name'),
    		'price' => request()->get('price')
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
    	$product->update([
    		'price' => request()->get('price')
    	]);

    	return $this->show($product);
    }

    public function delete(Product $product)
    {
    	$product->delete();

    	return json_encode(true);
    }
}
