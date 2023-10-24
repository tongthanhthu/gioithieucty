<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/view-daily-log', [\App\Http\Controllers\LogController::class, 'viewDailyLog'])->name('view-daily-log');

// Route::get('/404.html', [\App\Http\Controllers\LogController::class, 'error']);

Route::middleware('auth')->group(function () {
    include('admin.php');
});
//client routes
include('client.php');

require __DIR__.'/auth.php';

Route::get('/{any}', function () {
    return view('client.layouts.error');
})->where('any', '.*');
