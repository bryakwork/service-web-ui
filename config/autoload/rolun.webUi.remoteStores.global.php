<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 07.09.2018
 * Time: 13:19
 */

use rollun\datastore\DataStore\Factory\DataStoreAbstractFactory;
use rollun\datastore\DataStore\HttpClient;

$vehiclesApiUrl = '';
return [
    DataStoreAbstractFactory::KEY_DATASTORE => [
        'ebay-vehicles' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/vehicle-ebay-mysql",
            'options' => [
                'timeout' => 5,
            ]
        ],
        'rocky-vehicles' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/vehicle-rocky-mountain-mysql",
            'options' => [
                'timeout' => 5,
            ]
        ],
        'ebay-processors' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/ebay-processors-aspect-csv",
            'options' => [
                'timeout' => 5,
            ]
        ],
        'rocky-processors' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/rocky-mountain-processors-aspect-csv",
            'options' => [
                'timeout' => 5,
            ]
        ],
        'ebay-hash-history' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/ebay-hash-history",
            'options' => [
                'timeout' => 5,
            ]
        ],
        'rocky-hash-history' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/rocky-mountain-hash-history",
            'options' => [
                'timeout' => 5,
            ]
        ],
        'ebay-rocky-mountain-compatibility' => [
            'class' => HttpClient::class,
            'url' => "$vehiclesApiUrl/api/datastore/ebay-rocky-mountain-compatibility",
            'options' => [
                'timeout' => 5,
            ]
        ]
    ]
];