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

/**
 * Auth routes
 */
/** @deprecated middleware prevent-back-history, should be renamed */
Route::middleware('clear-cache')
->group(function () {
    Auth::routes();
});


/**
 * Public site
 */

/** Default controller for front site */
Route::get('/', 'Front\Home@index')->name( 'home' );
Route::get('/home', 'Front\Home@index');


/**
 * Admin site
 */

/** Group for admin namespace */
Route::namespace('Admin')
->prefix('admin')
/** @deprecated middleware prevent-back-history */
->middleware(['auth', 'clear-cache', 'inactive'])
->group(function () {

    /** Defaul controller for admin site */
    Route::get('/', 'DashboardController@index');

    /** Dashboard page */
    Route::get( 'dashboard', 'DashboardController@index' )->name( 'dashboard.index' );

    /** Users page */
    Route::resource('users', 'UsersController');
    Route::patch('users/{id}/password', 'UsersController@changePassword')->name( 'chance.password' );

    /** Roles page */
    Route::resource('roles', 'RolesController')->except('show');

    /** Permissions page */
    Route::resource('permissions', 'PermissionsController')->except([
        'destroy',
        'show',
    ]);

    /** User config page */
    Route::resource('users_config', 'UsersConfigController', ['only' => [
        'index',
        'update'
        ]]);
});
