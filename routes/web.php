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
Route::get('/notes', 'NoteListController@index')->name('notes');
Route::get('/listall', 'TaskListController@index')->name('listAll');
Route::post('/search', 'TaskListController@listByDate');
Route::get('/checked', 'TaskListController@checked');
Route::get('/unchecked', 'TaskListController@unchecked');
Route::get('/rewards', 'TaskListController@rewards');
Route::get('/new/task', 'TaskListController@create');
Route::get('/new/note', 'NoteListController@create');
Route::post('/new/task', 'TaskListController@store');
Route::post('/new/note', 'NoteListController@store');
Route::get('/edit/task/{id}', 'TaskListController@edit');
Route::get('/edit/note/{id}', 'NoteListController@edit');
Route::get('/check/{id}', 'TaskListController@check');
Route::post('/check/{id}', 'TaskListController@checkTask');
Route::get('/rewardcheck/{id}', 'TaskListController@rewardcheck');
Route::post('/update/task/{id}', 'TaskListController@update');
Route::post('/update/note/{id}', 'NoteListController@update');
Route::get('/delete/task/{id}', 'TaskListController@destroy');
Route::get('/delete/note/{id}', 'NoteListController@destroy');