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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'verify' => true
]);

Route::group(['middleware' => ['auth', 'verified'],], function (){

    Route::get('/todo', 'ToDoController@index')->name('todo.index');
    Route::post('/todo/store', 'ToDoController@store')->name('todo.store');
    Route::get('/todo/edit/{todo}', 'ToDoController@edit')->name('todo.edit');
    Route::put('/todo/{todo}/update', 'ToDoController@update')->name('todo.update');
    Route::delete('/todo/delete/{todo}', 'ToDoController@destroy')->name('todo.delete');

});

