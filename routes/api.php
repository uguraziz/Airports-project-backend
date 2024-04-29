<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\SearchController;

Route::get('/get/{id?}', [AuthController::class, 'get']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout/{id}', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('airports')->group(function () {
        Route::get('/get/{id?}', [AirportsController::class, 'get']);
        Route::post('/create', [AirportsController::class, 'create']);
        Route::post('/update/{id}', [AirportsController::class, 'update']);
        Route::post('/delete/{id}', [AirportsController::class, 'delete']);
    });
});

Route::prefix('countries')->group(function () {
    Route::get('get/{id?}', [CountriesController::class, 'get']);
    Route::post('create', [CountriesController::class, 'create']);
    Route::post('update/{id}', [CountriesController::class, 'update']);
    Route::post('delete/{id}', [CountriesController::class, 'delete']);
});

Route::prefix('search')->group(function () {
    Route::get('get', [SearchController::class, 'search']);
    Route::post('post', [SearchController::class, 'nearestAirports']);
});
