<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', LogoutController::class)->middleware('auth')->name('logout');

Route::view('/onboarding', 'pages.onboarding', $shared(['title' => 'Welcome']))->name('onboarding');

Route::view('/', 'pages.home', $shared(['title' => 'RMAIS']))->name('home');

Route::view('/prices', 'pages.prices', $shared(['title' => 'Price Board']))->name('prices');

Route::view('/advisor', 'pages.advisor', $shared(['title' => 'Smart Recommendation']))->name('advisor');

Route::middleware('auth')->group(function () use ($shared) {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::view('/settings', 'pages.settings', $shared(['title' => 'Settings']))->name('settings');

    Route::middleware('role:farmer')->group(function () use ($shared) {
        Route::view('/farmer/dashboard', 'pages.dashboard', $shared(['title' => 'Farmer Dashboard']))->name('farmer.dashboard');
        Route::view('/planting-planner', 'pages.planting-planner', $shared(['title' => 'Planting Planner']))->name('planting-planner');
    });

    Route::middleware('role:rice_trader')->group(function () use ($shared) {
        Route::view('/trader/dashboard', 'pages.dashboards.trader', $shared(['title' => 'Trader Dashboard']))->name('trader.dashboard');
    });

    Route::middleware('role:consumer')->group(function () use ($shared) {
        Route::view('/consumer/dashboard', 'pages.dashboards.consumer', $shared(['title' => 'Consumer Dashboard']))->name('consumer.dashboard');
        Route::view('/consumer-comparison', 'pages.consumer-comparison', $shared(['title' => 'Consumer Comparison']))->name('consumer-comparison');
    });

    Route::middleware('role:admin')->group(function () use ($shared) {
        Route::view('/admin/dashboard', 'pages.dashboards.admin', $shared(['title' => 'Admin Dashboard']))->name('admin.dashboard');
    });

    Route::middleware('role:super_admin')->group(function () use ($shared) {
        Route::view('/super-admin/dashboard', 'pages.dashboards.super-admin', $shared(['title' => 'Super Admin Dashboard']))->name('super-admin.dashboard');
    });
});
