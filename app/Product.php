<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price'];

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
