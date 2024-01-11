<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
        '/api/drinks' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'drinks'],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                       'title' => $entry->title,
                       'storeCat' => $entry->storeCategories,
                       'drinkImage' => $entry -> drinkimagesmall,
                       'price'=>$entry ->priceDrinks,
                       'introduction' => $entry -> introduction,
                       'alcohol'=> $entry -> alcoholPercentage,
                       'info' => $entry -> informationDrinks                       
                    ];
                },
            ];
        },
        '/api/drinks/<entryId:\d+>' => function($entryId) {
            return [
                'elementType' => Entry::class,
                'criteria' => ['id' => $entryId],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'one' => true,
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                       'title' => $entry->title,
                       'storeCat' => $entry->storeCategories,
                       'drinkImage' => $entry -> drinkimagesmall,
                       'price'=>$entry ->priceDrinks,
                       'introduction' => $entry -> introduction,
                       'alcohol'=> $entry -> alcoholPercentage,
                       'info' => $entry -> informationDrinks 
                    ];
                },
            ];
        },
    ]
];