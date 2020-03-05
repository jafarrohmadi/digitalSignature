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

Route::group(['prefix' => 'digitalsignature', 'as' => 'digitalsignature.', 'middleware' => 'auth'], function () {
    Route::get('/generateQrCode', 'DigitalSignatureGenerateQrController@getGenerateQrCode');
});
