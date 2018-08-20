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
    return view('welcome');
});

Route::get('services', 'ServiceController@index')->name('admin.service.index');


Route::get('/cars', 'CarsController@index')->name('cars.index');
Route::get('/visits', 'VisitsController@index')->name('visits.index');
Route::get('/search', 'CarsController@search')->name('cars.search');