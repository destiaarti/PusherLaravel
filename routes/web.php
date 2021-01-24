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

Route::get('/notification', 'PusherNotificationController@sendNotification');

Route::get('/', 'PaymentController@index')->name('payment');
Route::get('/get', 'PaymentController@get')->name('payment.get');

Route::get('/tambah', 'PaymentController@postPage')->name('payment.postPage');
Route::post('/post', 'PaymentController@post')->name('payment.post');
Route::post('/delete', 'PaymentController@delete')->name('payment.delete');
