<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RateController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ParkingController::class, 'home'])->name('home');

Route::get('/entry', [ParkingController::class, 'entryForm'])->name('entry.form');
Route::post('/entry', [ParkingController::class, 'storeEntry'])->name('entry.store');

Route::get('/exit', [ParkingController::class, 'exitForm'])->name('exit.form');
Route::post('/exit', [ParkingController::class, 'storeExit'])->name('exit.store');


Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [ReportController::class, 'dashboard'])->name('dashboard');

        Route::resource('slots', SlotController::class);
        Route::resource('rates', RateController::class);

        Route::get('reports/daily', [ReportController::class, 'daily'])->name('reports.daily');
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
