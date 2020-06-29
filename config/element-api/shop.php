<?php

use craft\commerce\elements\Product;
use craft\helpers\HeaderHelper;
use craft\elements\Entry;

function shop($slug)
{
    $category = \craft\elements\Category::find()
				->slug($slug)
				->one();
				
    $criteria = [
			'relatedTo' => $category
    ];
    return [
        'elementType' => Product::class,
        'one' => false,
        'paginate' => false,
        'criteria' => $criteria,
        'transformer' => function(Product $product) {
            return [
							'title' => $product->title,
							'material' => $product->material->one() ? $product->material->one()->title : null
            ];
        },
				'pretty' => getenv('ENVIRONMENT') === 'dev',
				'cache' => getenv('ENVIRONMENT') === 'production'
    ];
}