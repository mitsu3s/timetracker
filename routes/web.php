<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Route::get('/dashboard', [TaskController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::put('/update/{id}.', [TaskController::class, 'update'])->name('update');
    Route::delete('/destoroy/{id}', [TaskController::class, 'destroy'])->name('destroy');
    Route::get('/week', [TaskController::class, 'week'])->name('week');
    Route::get('/{year}/{month}', [TaskController::class, 'month'])->name('month');
    Route::get('/month', [TaskController::class, 'setmonth'])->name('setmonth');
    Route::get('/move', [TaskController::class, 'movemonth'])->name('movemonth');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
