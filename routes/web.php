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

Route::group(['namespace' => 'Frontend','as' => 'frontend.', 'middleware' => []], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('language/{locale}', 'HomeController@changeLanguage')->name('language.change');
});
Route::group(['namespace' => 'Backend','prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'adminAccessOnly','onlyActiveUsers']], function () {

});

//if (app()->environment('production') && Schema::hasTable('users')) {
Route::get('/logwith/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect()->route('backend.home');
});
//}

Route::group(['middleware' => ['auth']], function () {

});
Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
