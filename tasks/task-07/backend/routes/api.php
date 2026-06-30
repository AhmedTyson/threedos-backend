<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', CategoryController::class);
Route::apiResource('tasks', TaskController::class);

// Development route to run migrations and seeders via HTTP Request
Route::get('/setup/seed', function () {
    Artisan::call('migrate:fresh', ['--seed' => true]);

    return response()->json([
        'status' => 'success',
        'message' => 'Database successfully wiped and seeded!',
        'output' => Artisan::output()
    ]);
});
