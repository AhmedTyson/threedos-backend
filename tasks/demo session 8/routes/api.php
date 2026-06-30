<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get("/user",function(){
    return response()->json([
        "success" => true,
        "message" => "Hello World"
    ]);
});


Route::get("/posts",[postcontroller::class, "index"]);


























