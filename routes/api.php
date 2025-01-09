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

Route::prefix('v1')->group(function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::put('users/reset-password', [UserController::class, 'resetPassword'])->name('reset-password');
    Route::apiResource('users', UserController::class)->only(['store']);

    Route::group(['middleware' => 'auth:sanctum'], function () { // mine and others info or  my own only
        Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::apiResource('sites', SiteController::class)->only(['store', 'update', 'destroy']);
            Route::apiResource('vehicles', VehicleController::class)->only(['store', 'update', 'destroy']);
            Route::apiResource('accommodations', AccommodationController::class)->only(['store', 'update', 'destroy']);
            Route::apiResource('rooms', RoomController::class)->only(['store', 'update', 'destroy']);
            Route::apiResource('events', EventController::class)->only(['store', 'update', 'destroy']);
            Route::apiResource('users', UserController::class)->only(['index']);
            //confirm reservation by admin
        });
        Route::apiResource('sites', SiteController::class)->only(['index', 'show']);
        Route::apiResource('vehicles', VehicleController::class)->only(['index', 'show']);
        Route::apiResource('accommodations', AccommodationController::class)->only(['index', 'show']);
        Route::apiResource('rooms', RoomController::class)->only(['index', 'show']);
        Route::apiResource('events', EventController::class)->only(['index', 'show']);
        Route::get('departments', [UserController::class, 'listDepartments'])->name('departments.index');

        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');//show only mine but admin can show for all, edit & delete only mine
        Route::put('users', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('users', [UserController::class, 'destroy'])->name('users.destroy');
        Route::apiResource('tour-plans', TourController::class)->only(['index', 'show']);//index & show only mine but admin can index and show for all, edit & delete only mine
        Route::post('tour-plans', [TourController::class, 'store'])->name('tour-plans.store');
        Route::put('tour-plans', [TourController::class, 'edit'])->name('tour-plans.edit');
        Route::delete('tour-plans', [TourController::class, 'destroy'])->name('tour-plans.destroy');
        Route::apiResource('reservations', ReservationController::class)->only(['index', 'show']);//index & show only mine but admin can index and show for all, edit & delete only mine
        Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
        Route::delete('reservations', [ReservationController::class, 'delete'])->name('reservations.destroy');
        Route::put('users/update-password', [UserController::class, 'updatePassword'])->name('update-password');
    });
});
