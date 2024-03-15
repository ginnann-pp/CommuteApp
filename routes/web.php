<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommuteRecordsController;
use App\Http\Controllers\MyRootController;

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

    Route::get('/record/{commuteRecord}/edit-record', [CommuteRecordsController::class, 'edit'])
    ->name('record.edit-record');
    Route::patch('/record/{commuteRecord}/update-record', [CommuteRecordsController::class, 'update_record'])
    ->name('record.update-record');


    // マイルート設定
    Route::get('/record/add-myroot', [MyRootController::class, 'add_myroot'])
    ->name('record.add-myroot');
    Route::post('/record/create-myroot', [MyRootController::class, 'createOrUpdate_myroot'])
    ->name('record.create-myroot');

});

require __DIR__.'/auth.php';
