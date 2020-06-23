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

/*
Route::get('/contacts', 'ContactController@index')->name('contacts.index');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

Route::post('/contacts', 'ContactController@store')->name('contacts.store');

Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show');

Route::put('/contacts/{id}', 'ContactController@update')->name('contacts.update');

Route::delete('/contacts/{id}', 'ContactController@destroy')->name('contacts.destroy');

Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contacts.edit');
*/
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

/* --------------------------------------------------------------
|  Protecting Routes from being accessed by unauthenticated user
|  --------------------------------------------------------------
*/
/*
Route::get('/contacts', 'ContactController@index')
->name('contacts.index')
->middleware('auth');

Route::get('/contacts/create', 'ContactController@create')
->name('contacts.create')
->middleware('auth');

Route::get('/contacts/{id}', 'ContactController@show')
->name('contacts.show')
->middleware('auth');

Route::put('/contacts/{id}', 'ContactController@update')
->name('contacts.update')
->middleware('auth');

Route::delete('/contacts/{id}', 'ContactController@destroy')
->name('contacts.destroy')
->middleware('auth');

Route::get('/contacts/{id}/edit', 'ContactController@edit')
->name('contacts.edit')
->middleware('auth');
*/

/* --------------------------------------------------------------
|  Protecting Routes
|  --------------------------------------------------------------
|  By assigning the auth middleware in route group, then move our 
|  existing routes inside.
*/
Route::middleware('auth')->group(function ()
{
    Route::get('/contacts', 'ContactController@index')->name('contacts.index');
    Route::post('/contacts', 'ContactController@store')->name('contacts.store');
    Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');
    Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show');
    Route::put('/contacts/{id}', 'ContactController@update')->name('contacts.update');
    Route::delete('/contacts/{id}', 'ContactController@destroy')->name('contacts.destroy');
    Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contacts.edit');
});
