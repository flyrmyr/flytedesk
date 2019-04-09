<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
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
	protected $fillable = ['name', 'circulation'];

    /**
     * The products that belong to the school.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
