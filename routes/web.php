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

Route::view('/welcome', 'welcome')->name('welcome');

Route::controller('App\Http\Controllers\LoginController')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/doLogin', 'doLogin')->name('doLogin');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'index')->name('home');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
    
    Route::controller('App\Http\Controllers\MahasiswaController')->prefix('mahasiswa')->group(function () {
        Route::get('/formCreate', 'formCreate')->name('mahasiswa.formCreate');
        Route::get('/formUpdate/{id}', 'editById')->name('mahasiswa.formUpdate');
        Route::post('/create', 'create')->name('mahasiswa.create');
        Route::post('/update', 'updateById')->name('mahasiswa.update');
        Route::get('/list', 'getAll')->name('mahasiswa.list');
        Route::get('/delete/{id}', 'deleteById')->name('mahasiswa.delete');
    });

    Route::controller('App\Http\Controllers\MataKuliahController')->prefix('mata_kuliah')->group(function () {
        Route::get('/formCreate', 'formCreate')->name('mata_kuliah.formCreate');
        Route::get('/formUpdate/{id}', 'editById')->name('mata_kuliah.formUpdate');
        Route::post('/create', 'create')->name('mata_kuliah.create');
        Route::post('/update', 'updateById')->name('mata_kuliah.update');
        Route::get('/list', 'getAll')->name('mata_kuliah.list');
        Route::get('/delete/{id}', 'deleteById')->name('mata_kuliah.delete');
    });

    Route::controller('App\Http\Controllers\KrsController')->prefix('krs')->group(function () {
        Route::get('/formCreate', 'formCreate')->name('krs.formCreate');
        Route::post('/create', 'create')->name('krs.create');
        Route::get('/delete/{id}', 'deleteById')->name('krs.delete');
    });
});
