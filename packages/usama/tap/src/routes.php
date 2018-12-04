<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 6:04 PM
 */
Route::group(['middleware' => 'api'], function () {
    Route::post('api/payment', 'Usama\Tap\TapPaymentController@makePayment')->name('api.payment.create');
});


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('payment', 'Usama\Tap\TapPaymentController@makePayment')->name('web.payment.create');
});
Route::group(['middleware' => ['web']], function () {
    Route::get('result', 'Usama\Tap\TapPaymentController@result')->name('web.payment.result');
    Route::get('error', 'Usama\Tap\TapPaymentController@error')->name('web.payment.error');
});




