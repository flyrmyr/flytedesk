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
    	$school = School::create([
    		'name' => request()->get('name')
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
    	$school->update([
    		'name' => request()->get('name')
    	]);

    	return $this->show($school);
    }

    public function delete(School $school)
    {
    	$school->delete();

    	return json_encode(true);
    }
		
}
