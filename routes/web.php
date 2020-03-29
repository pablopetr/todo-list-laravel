<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TaskListController@listToday')->name('home');
Route::get('/listall', 'TaskListController@index')->name('listAll');
Route::post('/search', 'TaskListController@listByDate');
Route::get('/checked', 'TaskListController@checked');
Route::get('/unchecked', 'TaskListController@unchecked');
Route::get('/rewards', 'TaskListController@rewards');
Route::get('/new', 'TaskListController@create');
Route::post('/new', 'TaskListController@store');
Route::get('/edit/{id}', 'TaskListController@edit');
Route::get('/check/{id}', 'TaskListController@check');
Route::get('/rewardcheck/{id}', 'TaskListController@rewardcheck');
Route::post('/update/{id}', 'TaskListController@update');
Route::get('/delete/{id}', 'TaskListController@destroy');