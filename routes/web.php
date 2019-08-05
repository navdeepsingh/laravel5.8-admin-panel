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

// Reactjs Routes
Route::get('{reactRoutes}', function () {
    return view('layouts.react'); // your start view
})->where('reactRoutes', '^((?!admin|api|login|logout|password).)*$'); // except 'api' word

// Laravel Routes  
Route::group(['prefix' => 'api'], function () {
    Route::post('/signup', 'SignupController@store')->name('signup');
    Route::post('/redeem', 'SignupRedemptionController@redeem');
});


// Backend Routes
Auth::routes(['register' => false]);
Route::get('admin', 'Admin\AdminController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/users', 'Admin\UsersController');
    Route::view('admin/unauthorized', 'admin.unauthorized');
});
// Super Admin Roles
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'super-admin'], function () {
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('settings', 'SettingsController');
    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);

