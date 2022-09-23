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
    return view('welcome');
});
Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::post('/login', 'App\Http\Controller\LoginController@login')->name('login.api');
    Route::post('/blog/post', 'App\Http\Controller\PostController@post')->name('post.api');
    Route::post('/roles', 'App\Http\Controller\RoleController@show')->name('role.show.api');
    Route::post('/roles/create', 'App\Http\Controller\RoleController@create')->name('role.create.api');
});