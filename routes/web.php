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

Route::get("/","HomeController@index")->name("home");
Route::get('/logout', "HomeController@logout")->name("logout");

Auth::routes();
Route::get('/user/{user}', 'UserController@show')->name('user.show');
Route::group(['middleware' => ['auth','verified']],function () {
    Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserController@update')->name('user.update');
    Route::get('/user/{user}/delete', 'UserController@destroy')->name('user.delete');
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/internship/{internship}/delete', 'InternshipController@destroy')->name('internship.delete');
    Route::resource("internship","InternshipController")->except(["show","index","destroy"]);
});
Route::get("/internship/{internship}","InternshipController@show")->name("internship.show");