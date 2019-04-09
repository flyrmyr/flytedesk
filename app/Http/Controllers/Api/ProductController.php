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
     * Display a listing of the resource by value.
     *
     * @return \Illuminate\Http\Response
     */
    public function value()
    {
    	$products = Product::with('school')->get();

    	if(request()->has('value')) {
    		$products = $products->where('value', request()->get('value'));
    	}

        return fractal()
		   ->collection($products)
		   ->transformWith(new ProductTransformer())
		   ->includeSchool()
		   ->respond();
    }

    /**
     * Display a listing of the resource by schoolsCount.
     *
     * @return \Illuminate\Http\Response
     */
    public function schoolsCount()
    {
    	$standardProducts = collect(Product::$standardList)->map(function($name) {
    		return [
    			'product_ids' => Product::where('name', $name)->pluck('id')->toArray(),
    			'product_name' => $name,
    			'school_count' => School::whereHas('products', function($query) use ($name) {
	    			return $query->where('name', $name);
	    		})->count()
	    	];
    	});

    	if(request()->has('school_count')) {
    		$standardProducts = $standardProducts->filter(function($standardProduct) {
    			return $standardProduct['school_count'] == request()->get('school_count');
    		});
    	}

    	return json_encode([
    		'data' => array_values($standardProducts->toArray())
    	]);
    }
}
