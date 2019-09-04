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
Route::get('/', 'Book_recordsController@users_index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show','edit','update']]);
    
    Route::group(['prefix' => 'users/{id}'], function(){
        Route::get('book_lists','Book_recordsController@book_lists')->name('users.book_lists');
    });
    Route::group(['prefix' => 'bookrecords/{id}'],function(){
        Route::post('add_book_list','Book_listsController@store')->name('book_list.add');
        Route::delete('remove_book_list','Book_listsController@destroy')->name('book_list.remove');
    });
    
    Route::resource('book_records','Book_recordsController',['only'=>['index','create','store','edit','update','destroy']]);
});

