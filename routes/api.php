<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function (){
    Route::apiResource('tourists', \App\Http\Controllers\UserController::class);
    Route::apiResource('tourist-sites', \App\Http\Controllers\SiteController::class);
    Route::apiResource('hotels', \App\Http\Controllers\HotelController::class);
    Route::apiResource('rooms', \App\Http\Controllers\RoomController::class);
    Route::apiResource('vehicles', \App\Http\Controllers\VehicleController::class);
    Route::apiResource('events', \App\Http\Controllers\EventController::class);
    Route::apiResource('tour-plans', \App\Http\Controllers\TourController::class);
});


//Route::apiResource('tour-schedules', TourScheduleController::class);
