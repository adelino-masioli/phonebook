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
    return redirect('/contacts');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('contacts','ContactController');
    Route::resource('phones','PhoneController');
    Route::resource('logs','LogController');


    Route::get('/unauthorized', 'RoleController@unauthorized')->name('unauthorized');


});