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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::prefix('dashboard')->group(function(){
    Route::get('/', function() {
        return view('layouts.dashboard');
    });
    Route::get('/{any}', function() {
        return view('layouts.dashboard');
    });
    Route::get('/{any}/{any1}', function() {
        return view('layouts.dashboard');
    });
    Route::get('/{any}/{any1}/{any2}', function() {
        return view('layouts.dashboard');
    });
});
