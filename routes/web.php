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

Route::get('/gestionChambres', function () {
    return view('chambres.chambres');
});
Route::get('getRoom','RoomController@getRoom');
Route::post('createRoom','RoomController@createRoom');
Route::post('deleteRoom','RoomController@deleteRoom');
Route::post('editRoom/{id}','RoomController@editRoom');
Route::get('getInformationRoom/{id}','RoomController@getRom');

Route::get('/reservation/reserver', function () {
    return view('reservation.reserver');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
