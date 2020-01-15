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

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('top');

Route::resource('building', 'BuildingController', array('names' => 'building'));
Route::get('building/upload/{id}', 'BuildingController@upload')->name('building.upload');
Route::post('building/upload_post/{id}', 'BuildingController@uploadPost')->name('building.upload_post');
Route::get('building/download/{id}', 'BuildingController@download')->name('building.download');
Route::get('building/downloads/{str}', 'BuildingController@downloads')->name('building.downloads');

