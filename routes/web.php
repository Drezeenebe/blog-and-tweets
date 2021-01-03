<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entries/create', 'EntryController@create')->name('entries_create');
Route::post('/entries', 'EntryController@store')->name('entries_store');
Route::get('/entries/{entryBySlug}','GuestController@show');

/**Politicas de autorizacion en routas
->middleware('can:update,entry');*/
Route::put('/entries/{entry}', 'EntryController@update')->middleware('can:update,entry');
Route::get('/entries/{entry}/edit','EntryController@edit')->middleware('can:update,entry');

Route::get('/users/{user}','UserController@show');
