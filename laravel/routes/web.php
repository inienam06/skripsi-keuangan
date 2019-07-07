<?php

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
    return random_intchar(50);
})->name('welcome');

//ADMIN
Route::group(['prefix' => 'admin'], function() {
    Route::get('login', 'Admin\AuthController@form')->name('admin.login');
    Route::post('login', 'Admin\AuthController@login')->name('admin.login.auth');
    Route::get('logout', 'Admin\AuthController@logout')->name('admin.logout');

    //NEED AUTHORIZED ADMIN
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'Admin\DashboardController@index')->name('admin');

        //TU
        Route::group(['prefix' => 'tu'], function () {
            Route::get('/', 'Admin\DashboardController@tu')->name('admin.tu');
            Route::get('tambah', 'Admin\TUController@tambah')->name('admin.tu.tambah');
            Route::post('simpan', 'Admin\TUController@simpan')->name('admin.tu.simpan');
            Route::get('ubah/{id}', 'Admin\TUController@ubah')->name('admin.tu.ubah');
            Route::post('perbarui/{id}', 'Admin\TUController@perbarui')->name('admin.tu.perbarui');
            Route::get('hapus/{id}', 'Admin\TUController@hapus')->name('admin.tu.hapus');
        });
    });
});
