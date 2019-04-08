<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The schools that belong to the product.
     */
    public function schools()
    {
        return $this->belongsToMany('App\School');
    }


    public function getPriceAttribute($price)
	{
	    return $price / 100;
	}

	public function setPriceAttribute($price)
	{
	    $this->attributes['price'] = $price * 100;
	}
}
