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

//Route::group(['namespace' => 'Frontend', 'as' => 'frontend.', 'middleware' => []], function () {
//    Route::get('/', 'HomeController@index')->name('index');
//    Route::get('/home', 'HomeController@index')->name('home');
//    Route::get('language/{locale}', 'HomeController@changeLanguage')->name('language.change');
//});
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth', 'onlyActiveUsers']], function () {

    // only designers & admins
    Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('backup/db', ['as' => 'backup.db', 'uses' => 'HomeController@BackupDB']);
        Route::get('export/translations', ['as' => 'export.translation', 'uses' => 'HomeController@exportTranslations']);
        Route::get('activate', 'HomeController@toggleActivate')->name('activate');
//        Route::get('reset/password', 'UserController@getResetPassword')->name('reset.password');
//        Route::post('reset/password', 'UserController@postResetPassword')->name('reset');
        Route::resource('user', 'UserController');
        Route::resource('plan', 'PaymentPlanController');
        Route::resource('role', 'RoleController');
        Route::resource('category', 'CategoryController');
        Route::resource('slider', 'SliderController');
        Route::resource('order', 'OrderController');
        Route::resource('job', 'JobController');
        Route::resource('version', 'VersionController');
        Route::resource('image', 'ImageController');
        Route::resource('setting', 'SettingController');
    });

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('language/{locale}', 'HomeController@changeLanguage')->name('language.change');
    Route::get('reset/password', 'UserController@getResetPassword')->name('reset.password');
    Route::post('reset/password', 'UserController@postResetPassword')->name('reset');
    Route::resource('user', 'UserController')->only(['edit', 'update', 'show']);
    Route::resource('order', 'OrderController')->except(['destroy']);
    Route::get('/make/order/lang', 'OrderController@chooseOrderLang')->name('order.choose.lang');
    Route::resource('file', 'FileController');
    Route::resource('job', 'JobController');
    Route::resource('version', 'VersionController');
    Route::resource('image', 'ImageController');
    Route::resource('point', 'PointController');
});

if ((app()->environment('production') || app()->environment('local')) && Schema::hasTable('users')) {
    Route::get('/logwith/{id}', function ($id) {
        Auth::loginUsingId($id);
        return redirect()->route('backend.home');
    });
    Route::get('/logas/{role}', function ($role) {
        if ($role === 'designer') {
            $element = User::whereHas('role', function ($q) use ($role) {
                return $q->where(['name' => $role]);
            })->has('jobs', '>', 1)->first();
        } elseif ($role === 'client') {
            $element = User::whereHas('role', function ($q) use ($role) {
                return $q->where('name', $role);
            })->has('orders', '>', 1)->first();
        } else {
            $element = User::whereHas('role', function ($q) use ($role) {
                return $q->where('name', $role);
            })->first();
        }
        Auth::loginUsingId($element->id);
        return redirect()->route('backend.home');
    });
}

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
