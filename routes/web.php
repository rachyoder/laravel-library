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

use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/checkout', 'CheckoutController@store');

Route::get('/books', 'BooksController@index');
Route::post('/books', 'BooksController@store');
Route::get('/books/add', 'BooksController@create');
Route::post('/books/add', 'BooksController@addBook');
Route::post('/books/delete', 'BooksController@destroy');