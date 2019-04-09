<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Product;

class ProductTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'school'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => money_format('$%i', $product->price),
            'value' => money_format('$%i', $product->value),
            // 'school_count' => $product->schools->count()

            // school_id, school_name, product_id, product_name, value
        ];
    }

    /**
     * Include School
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeSchool(Product $product)
    {
        return $this->item($product->school, new SchoolTransformer);
    }
}
