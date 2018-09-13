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
Route::any('/cars/create', 'CarsController@create')->name('car.create');
Route::any('/cars/{car}/edit', 'CarsController@edit')->name('car.edit');
Route::any('/cars/{car}/delete', 'CarsController@delete')->name('car.delete');
Route::any('/search', 'CarsController@search')->name('cars.search');
Route::any('/car/{car}/visits', 'CarsController@carVisits')->name('car.visits');



Route::get('/visits', 'VisitsController@index')->name('visits.index');
Route::any('/visit/create', 'VisitsController@create')->name('visit.create');
Route::any('/visit/{visit}/edit', 'VisitsController@edit')->name('visit.edit');
Route::any('/visits/car/search', 'VisitsController@carSearch')->name('visits.car.search');


