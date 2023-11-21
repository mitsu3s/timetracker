<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ScheduleController::class, 'index'])->name('dashboard');
    Route::get('/create', [ScheduleController::class, 'create'])->name('create');
    Route::post('/store', [ScheduleController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
    Route::put('/update/{id}.', [ScheduleController::class, 'update'])->name('update');
    Route::delete('/destoroy/{id}', [ScheduleController::class, 'destroy'])->name('destroy');

    Route::get('/{year}/{month}/{day}', [ScheduleController::class, 'week'])->where([
        'year' => '[0-9]+',
        'month' => '([1-9]|1[0-2])',
        'day' => '([1-9]|[1-2][0-9]|3[0-1])'
    ])
        ->name('week');
    Route::get('/week', [ScheduleController::class, 'setweek'])->name('setweek');
    Route::get('/moveweek', [ScheduleController::class, 'moveweek'])->name('moveweek');

    Route::get('/{year}/{month}', [ScheduleController::class, 'month'])
        ->where(['year' => '[0-9]+', 'month' => '([1-9]|1[0-2])'])
        ->name('month');

    Route::get('/month', [ScheduleController::class, 'setmonth'])->name('setmonth');
    Route::get('/movemonth', [ScheduleController::class, 'movemonth'])->name('movemonth');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
