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
    protected $fillable = ['school_id', 'name', 'price'];

    public static $standardList = ['Full Page Ad', 'Half Page Ad', 'Quarter Page Ad', 'Eighth Page Ad'];

    /**
     * The schools that belong to the product.
     */
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function getValueAttribute()
    {
        return round($this->price / $this->school->circulation, 2);
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
