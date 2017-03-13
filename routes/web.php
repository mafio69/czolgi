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
Route::group([
    'middleware' => 'role',
    'role' => ['admin', 'moderator', 'user']
], function () {

});
Route::group([
    'middleware' => 'role',
    'role' => 'admin'
], function () {
    Route::get('dzialy', [
        'uses' => 'SectionsController@index',
        'as' => 'sections'
    ]);
    Route::post('dzialy', [
        'uses' => 'SectionsController@store',
        'as' => 'sections.store'
    ]);

    Route::get('dzialy/{id}/edit', [
        'uses' => 'SectionsController@edit',
        'as' => 'sections.edit'
    ]);
    Route::put('dzialy/{id}', [
        'uses' => 'SectionsController@update',
        'as' => 'sections.update'
    ]);
    Route::delete('dzialy/{id}', [
        'uses' => 'SectionsController@destroy',
        'as' => 'sections.delete'
    ]);
    Route::get('users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('users/create', [
        'uses' => 'UsersController@create',
        'as' => 'users.create'
    ]);

    Route::post('users/store', [
        'uses' => 'UsersController@store',
        'as' => 'users.store'
    ]);

    Route::get('users/{id}/edit', [
        'uses' => 'UsersController@edit',
        'as' => 'users.edit'
    ]);

    Route::put('users/{id}', [
        'uses' => 'UsersController@update',
        'as' => 'users.update'
    ]);

    Route::delete('users/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'users.delete'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
