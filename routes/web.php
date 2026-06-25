<?php

use Illuminate\Support\Facades\Route;

$samplePrices = [
    [
        'category' => 'Dry Palay',
        'price' => 'PHP 23.50/kg',
        'change' => '+2.4%',
        'trend' => 'Increasing',
        'confidence' => 'High',
        'sources' => 3,
    ],
    [
        'category' => 'Fresh Palay',
        'price' => 'PHP 19.80/kg',
        'change' => '+1.1%',
        'trend' => 'Increasing',
        'confidence' => 'High',
        'sources' => 3,
    ],
    [
        'category' => 'Well-Milled Rice',
        'price' => 'PHP 52.00/kg',
        'change' => '+0.8%',
        'trend' => 'Stable',
        'confidence' => 'High',
        'sources' => 3,
    ],
    [
        'category' => 'Special Rice',
        'price' => 'PHP 60.00/kg',
        'change' => '+1.9%',
        'trend' => 'Increasing',
        'confidence' => 'High',
        'sources' => 3,
    ],
];

$shared = static fn (array $extra = []) => array_merge([
    'location' => "M'lang, North Cotabato",
    'prices' => $samplePrices,
    'recommendation' => 'Compare Buyers First',
    'disclaimer' => 'Advice is for decision support only and does not guarantee future prices.',
], $extra);

Route::view('/onboarding', 'pages.onboarding', $shared(['title' => 'Welcome']));

Route::view('/', 'pages.home', $shared(['title' => 'RMAIS']));

Route::view('/prices', 'pages.prices', $shared(['title' => 'Price Board']));

Route::view('/advisor', 'pages.advisor', $shared(['title' => 'Smart Recommendation']));

Route::view('/planting-planner', 'pages.planting-planner', $shared(['title' => 'Planting Planner']));

Route::view('/consumer-comparison', 'pages.consumer-comparison', $shared(['title' => 'Consumer Comparison']));

Route::view('/dashboard', 'pages.dashboard', $shared(['title' => 'Farmer Dashboard']));

Route::view('/settings', 'pages.settings', $shared(['title' => 'Settings']));
