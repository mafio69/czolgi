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




Route::group([
    'middleware' => 'role',
    'role' => 'admin'
], function () {
    Route::get('admin', function () {
        return view('admin.start');
    });
///////////////////////ENCYKLOPEDIA
    Route::get('admin/encyklopedia', [
        'uses' => 'GalleriesController@index',
        'as' => 'galleries'
    ]);
    Route::get('admin/encyklopedia/create', [
        'uses' => 'GalleriesController@create',
        'as' => 'galleries'
    ]);
    Route::post('admin/encyklopedia', [
        'uses' => 'GalleriesController@store',
        'as' => 'galleries.store'
    ]);
    Route::get('admin/encyklopedia/{id}/dane', [
        'uses' => 'GalleriesController@dane',
        'as' => 'galleries.create'
    ]);
    Route::get('admin/encyklopedia/{id}/edit', [
        'uses' => 'GalleriesController@edit',
        'as' => 'galleries.edit'
    ]);
    Route::put('/admin/encyklopedia/{id}', [
        'uses' => 'GalleriesController@update',
        'as' => 'galleries.update'
    ]);
    Route::delete('/admin/encyklopedia/{id}', [
        'uses' => 'GalleriesController@destroy',
        'as' => 'galleries.delete'
    ]);

    ///////////////////////TYPY CZOŁGÓW
    Route::get('/admin/typyCzolgow', [
        'uses' => 'TypeTanksController@index',
        'as' => 'typeTanks'
    ]);
    Route::post('/admin/typyCzolgow', [
        'uses' => 'TypeTanksController@store',
        'as' => 'typeTanks.store'
    ]);
    Route::put('/admin/typyCzolgow/{id}', [
        'uses' => 'TypeTanksController@update',
        'as' => 'typeTanks.update'
    ]);
    Route::delete('/admin/typyCzolgow/{id}', [
        'uses' => 'TypeTanksController@destroy',
        'as' => 'typeTanks.delete'
    ]);
    Route::get('admin/typyCzolgow/{id}', [
        'uses' => 'TypeTanksController@show',
        'as' => 'typeTanks.show'
    ]);


///////////////////////NOWOŚCI
    Route::get('/admin/nowosci', [
        'uses' => 'NoveltiesController@index',
        'as' => 'novelties'
    ]);
    Route::get('admin/nowosci/{id}', [
        'uses' => 'NoveltiesController@show',
        'as' => 'novelties.show'
    ]);
    Route::post('admin/nowosci', [
        'uses' => 'NoveltiesController@store',
        'as' => 'novelties.store'
    ]);
    Route::post('admin/nowosci/obrazek/{id}', [
        'uses' => 'NoveltiesController@image',
        'as' => 'novelties.image'
    ]);

    Route::patch('/admin/nowosci/storeimg/{id}', [
        'uses' => 'NoveltiesController@storeimg',
        'as' => 'novelties.imagestore'
    ]);

    Route::put('/admin/nowosci/{id}', [
        'uses' => 'NoveltiesController@update',
        'as' => 'novelties.update'
    ]);
    Route::delete('/admin/nowosci/{id}', [
        'uses' => 'NoveltiesController@destroy',
        'as' => 'novelties.delete'

    ]);
///////////////////////Artykuły
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
    ///////////////////////Działy
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
    Route::put('/admin/dzialy/{id}', [
        'uses' => 'SectionsController@update',
        'as' => 'sections.update'
    ]);
    Route::delete('admin/dzialy/{id}', [
        'uses' => 'SectionsController@destroy',
        'as' => 'sections.delete'
    ]);
    ///////////////////////Użytkownicy
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
    /////////////////////////////Komentarze
    Route::get('/admin/komentarze', [
        'uses' => 'CommentGalleriesController@index',
        'as' => 'admin.commentGalleries'
    ]);
    Route::post('/admin/komentarze/{id}/zmien', [
        'uses' => 'CommentGalleriesController@change',
        'as' => 'admin.change'
    ]);
    Route::delete('/admin/komentarze/{id}', [
        'uses' => 'CommentGalleriesController@destroy',
        'as' => 'admin.commentGalleries.delete'
    ]);

    ///////////////////////////////KsiegaGości
    Route::get('/admin/ksiega-gosci', [
        'uses' => 'QuestbooksController@index',
        'as' => 'admin.QuestbooksController'
    ]);
    Route::post('/admin/ksiega-gosci/{id}/zmien', [
        'uses' => 'QuestbooksController@change',
        'as' => 'admin.QuestbooksController.change'
    ]);
    Route::delete('/admin/ksiega-gosci/{id}', [
        'uses' => 'QuestbooksController@destroy',
        'as' => 'admin.QuestbooksController.delete'
    ]);
    Route::get('/home', 'HomeController@index');
});
Route::group([
    'middleware' => 'role',
    'role' => ['admin', 'moderator', 'user']
], function () {

});


Auth::routes();

Route::get('/', [
    'uses' => 'SiteController@index',
    'as' => 'SiteController'
]);
Route::get('/tapety', [
    'uses' => 'SiteController@wallpers',
    'as' => 'SiteController.wallpers'
]);
Route::get('/artykuly', [
    'uses' => 'SiteController@articles',
    'as' => 'SiteController.articles'
]);
Route::get('/artykuly/{id}', [
    'uses' => 'SiteController@article',
    'as' => 'SiteController.article'
]);

Route::get('/encyklopedia', [
    'uses' => 'SiteController@galleries',
    'as' => 'SiteController.galleries'
]);
Route::get('/ksiega', [
    'uses' => 'SiteController@book',
    'as' => 'SiteController.book'
]);
Route::post('/ksiega/add', [
    'uses' => 'SiteController@bookAdd',
    'as' => 'SiteController.bookAdd'
]);
Route::get('/encyklopedia/{id}', [
    'uses' => 'SiteController@galleriesOne',
    'as' => 'SiteController.galleriesOne'
]);
Route::get('/encyklopedia-szukaj', [
    'uses' => 'SiteController@search',
    'as' => 'SiteController.search'
]);
Route::post('/komentarze/add', [
    'uses' => 'CommentGalleriesController@store',
    'as' => 'commentGalleries.store'
]);
Route::post('/kontakt', [
    'uses' => 'KontaktController@send',
    'as' => 'KontaktController.send'
]);