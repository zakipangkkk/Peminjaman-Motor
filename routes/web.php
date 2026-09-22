<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/motor', [MotorController::class, 'index'])
        ->name('motor_user.index');

    Route::get('/motor/{id}', [MotorController::class, 'detail'])
        ->name('motor.detail');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', function () {
            return view('admin.index');
        })->name('dashboard');

        // Motor
        Route::get('/motor', [MotorController::class, 'adminIndex'])
            ->name('motor.index');

        Route::get('/motor/create', [MotorController::class, 'create'])
            ->name('motor.create');

        Route::post('/motor', [MotorController::class, 'store'])
            ->name('motor.store');

        Route::get('/motor/{id}/edit', [MotorController::class, 'edit'])
            ->name('motor.edit');

        Route::put('/motor/{id}', [MotorController::class, 'update'])
            ->name('motor.update');

        Route::delete('/motor/{id}', [MotorController::class, 'destroy'])
            ->name('motor.destroy');


        Route::resource('Booking', BookingController::class);
        Route::resource('user', UserController::class);

        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');
    });