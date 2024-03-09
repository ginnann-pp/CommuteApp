<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommuteRecordsController;

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

Route::get('/dashboard', [CommuteRecordsController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 編集ルート
    Route::get('/record/add-record', [CommuteRecordsController::class, 'add_record'])
    ->name('record.add-record');

    Route::post('/record/create', [CommuteRecordsController::class, 'create_record'])
    ->name('record.create');
    Route::delete('/record/{commuteRecord}/destroy', [CommuteRecordsController::class, 'destroy_record'])
    ->name('record.destroy');

});

require __DIR__.'/auth.php';
