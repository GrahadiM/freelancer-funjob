<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [App\Http\Controllers\ApiController::class, 'login']);
Route::post('/register', [App\Http\Controllers\ApiController::class, 'register']);

Route::post('/kota', [App\Http\Controllers\ApiController::class, 'showKota']);
Route::post('/kecamatan', [App\Http\Controllers\ApiController::class, 'showKecamatan']);
Route::post('/jasa', [App\Http\Controllers\ApiController::class, 'showJasa']);
Route::post('/top-jasa', [App\Http\Controllers\ApiController::class, 'topJasa']);
Route::post('/category', [App\Http\Controllers\ApiController::class, 'showCategory']);

Route::post('/komentar', [App\Http\Controllers\ApiController::class, 'storeKomentar']);
Route::post('/pesanan', [App\Http\Controllers\ApiController::class, 'storePesanan']);

Route::get('/user/{id}', [App\Http\Controllers\ApiController::class, 'detailUser']);
Route::get('/pesanan/{userId}', [App\Http\Controllers\ApiController::class, 'getPesanan']);
Route::get('/komentar/{jasaId}', [App\Http\Controllers\ApiController::class, 'getKomentar']);

Route::get('/detail-jasa/{id}', [App\Http\Controllers\ApiController::class, 'getOneJasa']);
Route::get('/jasa/{categoryId}', [App\Http\Controllers\ApiController::class, 'getCategoryJasa']);

Route::get('/user-jasa/{userId}', [App\Http\Controllers\ApiController::class, 'getRecentJasa']);
