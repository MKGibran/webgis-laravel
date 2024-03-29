<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DotsController;
use App\Http\Controllers\PolygonsController;

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

Route::resource('dots', DotsController::class);
Route::resource('polygons', PolygonsController::class);
