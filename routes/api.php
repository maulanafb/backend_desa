<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// routes/api.php

Route::apiResource('users',UserController::class);
Route::get('users/all/paginated',[UserController::class,'getAllPaginated']);



