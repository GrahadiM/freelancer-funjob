<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//HTTP 403
Route::get('/403', function () {return view('errors.403');})->name('403');
//HTTP 419
Route::get('/419', function () {return view('errors.419');})->name('419');
//HTTP 404
Route::get('/404', function () {return view('errors.404');})->name('404');
//HTTP 500
Route::get('/500', function () {return view('errors.500');})->name('500');

Auth::routes();

// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
// Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    
    // Route::resource('role', App\Http\Controllers\RoleController::class);
    // Route::resource('status', App\Http\Controllers\StatusController::class);

    //Route Admin dan Arsitek
    Route::group(['middleware' => ['auth', 'role:1,2']], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Route::get('logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
        Route::resource('/profile', App\Http\Controllers\ProfileController::class, ['only' => ['index', 'update']]);
        Route::resource('jasa', App\Http\Controllers\JasaController::class);
        Route::resource('pesanan', App\Http\Controllers\PesananController::class);
        Route::resource('komentar', App\Http\Controllers\KomentarController::class);
        Route::get('/pesan', [App\Http\Controllers\PesananController::class, 'pesan'])->name('pesan.index');
        Route::get('/pesan-person/{id}', [App\Http\Controllers\PesananController::class, 'pesanPerson'])->name('pesan.person');
        Route::post('/pesan-person/{id}', [App\Http\Controllers\PesananController::class, 'pesanKirim'])->name('pesan.store');
    });
    
    //Route Admin
    Route::group(['middleware' => ['auth', 'role:1']], function () {
        Route::resource('/home', App\Http\Controllers\HomeController::class, ['only' => ['edit', 'update']]);
        Route::resource('kota', App\Http\Controllers\KotaController::class);
        Route::resource('kecamatan', App\Http\Controllers\KecamatanController::class);
        Route::resource('kategori', App\Http\Controllers\KategoriJasaController::class);
    });

});
