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
Auth::routes();
Route::middleware(['auth'])->group(function ()
{
    Route::get('/', 'ControllerMahasiswa@index');
    Route::post('/mhs/tambah', 'ControllerMahasiswa@create');
    Route::get('/mhs/{id}/edit', 'ControllerMahasiswa@edit');
    Route::post('/mhs/{id}/update', 'ControllerMahasiswa@update');
    Route::get('/mhs/{id}/delete', 'ControllerMahasiswa@delete');
    Route::post('/mhs/search', 'ControllerMahasiswa@index');
});
Route::get('/test','LatihanController@index');
Route::get('/test/{id}/edit','LatihanController@edit');
Route::post('/test/insert','LatihanController@create');
Route::post('/test/{id}/update','LatihanController@update');
Route::get('/test/{id}/delete','LatihanController@delete');