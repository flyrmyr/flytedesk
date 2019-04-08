<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The products that belong to the school.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
