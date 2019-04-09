<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\School;

class SchoolTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'products'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(School $school)
    {
        return [
            'id' => $school->id,
            'name' => $school->name,
            'postal_code' => $school->postal_code,
            'circulation' => $school->circulation
        ];
    }

    /**
     * Include Products
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeProducts(School $school)
    {
        return $this->collection($school->products, new ProductTransformer);
    }
}
