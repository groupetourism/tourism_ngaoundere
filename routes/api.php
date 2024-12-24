<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReservationController;
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
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('logout/{user}', [UserController::class, 'logout']);
    Route::put('users/reset-password', [UserController::class, 'resetPassword']);

//    Route::middleware(['admin'])->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('sites', SiteController::class);
        Route::apiResource('vehicles', VehicleController::class);
        Route::apiResource('accommodations', AccommodationController::class);
        Route::apiResource('rooms', RoomController::class);
        Route::apiResource('events', EventController::class);
//    });

//    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('tour-plans', TourController::class);
        Route::apiResource('reservations', ReservationController::class);
        //confirm reservation by admin
//    });
});


//Route::apiResource('tour-schedules', TourScheduleController::class);
