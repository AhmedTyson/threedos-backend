<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/telescope-dashboard/{any?}', [\Wame\LaravelTelescopeDashboard\Http\Controllers\DashboardController::class, 'index'])
    ->where('any', '.*')
    ->middleware(config('wame-telescope-dashboard.middleware', ['web', 'auth']));
