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
    Route::get('admin/artykuly', [
        'uses' => 'ArticlesController@index',
        'as' => 'articles'
    ]);
    Route::get('admin/artykuly/create', [
        'uses' => 'ArticlesController@create',
        'as' => 'articles.create'
    ]);
    Route::get('admin/artykuly/{id}', [
        'uses' => 'ArticlesController@dane',
        'as' => 'articles.dane'
    ]);
    Route::post('admin/artykuly', [
        'uses' => 'ArticlesController@store',
        'as' => 'articles.store'
    ]);
    Route::delete('admin/artykuly/{id}', [
        'uses' => 'ArticlesController@destroy',
        'as' => 'articles.delete'
    ]);
    Route::get('admin/artykuly/{id}/edit', [
        'uses' => 'ArticlesController@edit',
        'as' => 'articles.edit'
    ]);
    Route::put('admin/artykuly/{id}', [
        'uses' => 'ArticlesController@update',
        'as' => 'articles.update'
    ]);
    Route::get('admin/dzialy', [
        'uses' => 'SectionsController@index',
        'as' => 'sections'
    ]);
    Route::get('admin/dzialy/{id}', [
        'uses' => 'SectionsController@dane',
        'as' => 'sections.dane'
    ]);
    Route::post('admin/dzialy', [
        'uses' => 'SectionsController@store',
        'as' => 'sections.store'
    ]);

    Route::get('admin/dzialy/{id}/edit', [
        'uses' => 'SectionsController@edit',
        'as' => 'sections.edit'
    ]);
    Route::put('admin/dzialy/{id}', [
        'uses' => 'SectionsController@update',
        'as' => 'sections.update'
    ]);
    Route::delete('admin/dzialy/{id}', [
        'uses' => 'SectionsController@destroy',
        'as' => 'sections.delete'
    ]);
    Route::get('/admin/users', [
        'uses' => 'UsersController@index',
        'as' => 'admin.users'
    ]);

    Route::get('/admin/users/create', [
        'uses' => 'UsersController@create',
        'as' => 'admin.users.create'
    ]);

    Route::post('/admin/users/store', [
        'uses' => 'UsersController@store',
        'as' => 'admin.users.store'
    ]);

    Route::get('/admin/users/{id}/edit', [
        'uses' => 'UsersController@edit',
        'as' => 'admin.users.edit'
    ]);

    Route::put('/admin/users/{id}', [
        'uses' => 'UsersController@update',
        'as' => 'admin.users.update'
    ]);

    Route::delete('/admin/users/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'admin.users.delete'
    ]);
    Route::resource('Admin/Nowosci','NewsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
