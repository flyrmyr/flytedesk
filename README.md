Flytedesk
=======

# College List App - Back End

## Steps to get the program up and running

Please run the following commands:

	1. Copy .env.example to .env and fill out database credentials for your local environment
	2. Run `composer install`
	3. Run `php artisan migrate:refresh --seed`
	4. Visit the endpoints outlined in the instructions

School endpoints:

	* Get: api/schools  --  gets an index of all school records
	* Post: api/schools  --  creates a record for a new school
	* Get: api/schools/{school_id}  --  gets the record for an idividual school
	* Put: api/schools/{school_id}  --  updates the record for an idividual school
	* Delete: api/schools/{school_id}  --  deletes the record for an idividual school


School-Product endpoints:

	* Get: api/schools/{school_id}/products  --  gets an index of all product records attached to the specified school
	* Post: api/schools/{school_id}/products  --  creates a record for a new product attached to the specified school
	* Get: api/schools/{school_id}/products/{product_id}  --  gets the record for an idividual product attached to the specified school
	* Put: api/schools/{school_id}/products/{product_id}  --  updates the record for an idividual product attached to the specified school
	* Delete: api/schools/{school_id}/products/{product_id}  --  deletes the record for an idividual product attached to the specified school


Route::get('export/schools', ['uses' => 'Api\SchoolController@export', 'as' => 'schools.export']);// to export the schools CSV


Product endpoints:

	* Get: api/products/schoolsCount  --  gets list of product ids, shared product name, and the number of schools attached to that product - can accept an optional "school_count" url parameter
	* Get: api/products/value  --  gets list of products and their value, with the school they are associated with - can accept an optional "value" url parameter


## Ways I could improve or expand upon the current version of my API

	* 


Text attributes _italic_, 
**bold**, `monospace`.

Horizontal rule:

---
