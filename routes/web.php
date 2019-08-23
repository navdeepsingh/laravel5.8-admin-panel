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
// use Illuminate\Support\Carbon;
// use \App\Signup;

// $signup = Signup::find(1);
// dd(Carbon::createFromFormat('Y-m-d H:i:s', $signup->created_at)
//                 ->format('d-m-Y'));


// Reactjs Routes
Route::get('{reactRoutes}', function () {
    return view('layouts.react'); // your start view
})->where('reactRoutes', '^((?!admin|api|login|logout|password).)*$'); // except 'api' word

// Laravel Routes  
Route::group(['prefix' => 'api'], function () {
    Route::post('/signup', 'SignupController@store')->name('signup');
    Route::post('/redeem', 'SignupRedemptionController@redeem');
    Route::get('/redeem_code/{code}', 'SignupRedemptionController@getRedeem');
});


// Backend Routes
Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::get('admin/profile/{id}', 'Admin\UsersController@edit');
    Route::view('admin/unauthorized', 'admin.unauthorized');
    Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);
    Route::get('admin/signups', 'Admin\SignupsController@index');
    Route::get('admin/signups/{id}', 'Admin\SignupsController@show');  
    Route::get('admin/signups-download', 'Admin\SignupsController@download');    
});

// Super Admin Roles
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'super-admin'], function () {
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('settings', 'SettingsController');
    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::delete('signups/{id}', 'SignupsController@destroy');
    Route::resource('admin/pages', 'Admin\PagesController');
});



