<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JalanController;
use App\Http\Controllers\MapController;
use App\Http\Middleware\AuthMiddleware;
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

Route::get('/', function () {
    return view('index');
});

// Login
Route::get('auth', function () {
    return view('login');
});
Route::post('auth/login', [AuthController::class,'login']);
Route::get('auth/logout', [AuthController::class,'logout']);

// Maps
Route::get('maps',[MapController::class, 'index']);
Route::get('/maps/jalan', [JalanController::class, 'index']);
Route::get('/maps/jalan/data', [JalanController::class, 'data']);
Route::get('/maps/jalan/{id}', [JalanController::class, 'data_jalan']); // Get data jalan by id
// Route::get('/maps/irigasi', IrigasiController)
// Route::get('/maps/tps', TPSController)

Route::prefix('admin')->middleware([AuthMiddleware::class])->group( function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    // Route::get('dashboard', function () {
    //     return view('layout.back.index');

    // });
    Route::resource('jalan', JalanController::class);

});


