<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Transformers\SchoolTransformer;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return fractal()
		   ->collection(School::all())
		   ->transformWith(new SchoolTransformer())
		   ->includeProducts()
		   ->respond();
    }

    public function create()
    {
    	// Validate input
    	$input = request()->validate([
	        'name' => 'required|string|min:1',
	        'circulation' => 'required|integer|min:1',
	    ]);

    	// Create school with input
    	$school = School::create([
    		'name' => $input['name'],
    		'circulation' => $input['circulation'],
    	]);

    	return $this->show($school);
    }

    public function show(School $school)
    {
    	return fractal()
		   ->item($school)
		   ->transformWith(new SchoolTransformer())
		   ->includeProducts()
		   ->respond();
    }

    public function update(School $school)
    {
    	// Validate input
    	$input = request()->validate([
	        'name' => 'string|min:1',
	        'circulation' => 'integer|min:1',
	    ]);

    	// Update attributes if passed
    	if(isset($input['name'])) {
    		$school->name = $input['name'];
    	}
    	if(isset($input['circulation'])) {
    		$school->circulation = $input['circulation'];
    	}

    	// Save if attributes changed
    	if($school->isDirty()) {
    		$school->save();
    	}

    	return $this->show($school);
    }

    public function delete(School $school)
    {
    	$school->delete();

    	return json_encode(true);
    }
		
}
