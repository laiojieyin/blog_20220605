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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
// Route::get('/posts/show', 'PostController@show');
Route::get('/posts/{id}/edit', 'PostController@edit');
Route::put('/posts/{id}', 'PostController@update');
Route::delete('/posts/{id}', 'PostController@destroy');
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController')->only(['index', 'destroy']);
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
