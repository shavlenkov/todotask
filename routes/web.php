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


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::middleware('guest')->namespace('\App\Http\Controllers')->group(function() {
    Route::get('/signup', 'AuthController@getSignup')->name('get.signup');
    Route::post('/auth/signup', 'AuthController@postSignup')->name('post.signup');

    Route::get('/signin', 'AuthController@getSignin')->name('get.signin');
    Route::post('/auth/signin', 'AuthController@postSignin')->name('post.signin');
});

Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('get.logout');

Route::middleware('auth')->namespace('\App\Http\Controllers')->group(function() {
    Route::get('/tasks/active', 'TasksController@active')->name('tasks.active');
    Route::get('/tasks/missed', 'TasksController@missed')->name('tasks.missed');
    Route::get('/tasks/create', 'TasksController@create')->name('tasks.create');
    Route::post('/tasks/create', 'TasksController@store')->name('tasks.store');
    Route::get('/tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');
    Route::put('/tasks/{id}/edit', 'TasksController@update')->name('tasks.update');
    Route::delete('/tasks/{id}', 'TasksController@destroy')->name('tasks.destroy');
});
