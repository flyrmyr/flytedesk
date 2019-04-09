Flytedesk
=======

# College List App - Back End

## Steps to get the program up and running

Please run the following commands:

	1. Copy .env.example to .env and fill out database credentials for your local environment
	2. Run `composer install`
	3. Run `php artisan migrate:refresh --seed`
	4. Visit the endpoints outlined in the instructions

Active urls are:
	* Get: api/schools _(gets an index of all school records)_
	* Post: api/schools _(creates a record for a new school)_
	* Get: api/schools/{school} _(gets the record for an idividual school)_
	* Put: api/schools/{school} _(updates the record for an idividual school)_
	* Delete: api/schools/{school} _(deletes the record for an idividual school)_


	* Get: api/schools/{school}/products _(gets an index of all product records attached to the specified school)_
	* Post: api/schools/{school}/products _(creates a record for a new product attached to the specified school)_
	* Get: api/schools/{school}/products/{product} _(gets the record for an idividual product attached to the specified school)_
	* Put: api/schools/{school}/products/{product} _(updates the record for an idividual product attached to the specified school)_
	* Delete: api/schools/{school}/products/{product} _(deletes the record for an idividual product attached to the specified school)_


Route::get('export/schools', ['uses' => 'Api\SchoolController@export', 'as' => 'schools.export']);// to export the schools CSV

	
	* Get: api/products/schoolsCount _(gets list of product ids, shared product name, and the number of schools attached to that product - *can accept an optional "school_count" url parameter*)_
	* Get: api/products/value _(gets list of products and their value, with the school they are associated with - *can accept an optional "value" url parameter*)_


## Ways I could improve or expand upon the current version of my API

	* 


Text attributes _italic_, 
**bold**, `monospace`.

Horizontal rule:

---
