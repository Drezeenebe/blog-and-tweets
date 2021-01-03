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
Route::put('/entries/{entry}', 'EntryController@update');

Route::get('/entries/{entryBySlug}','GuestController@show');
Route::get('/entries/{entry}/edit','EntryController@edit');

Route::get('/users/{user}','UserController@show');
