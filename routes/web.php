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
/** @deprecated middleware prevent-back-history */
Route::middleware('prevent-back-history')
->group(function () {
    Auth::routes();
});

/**
 * Public site
 */

/** Defaul controller for front site */
Route::get('/', 'Front\Home@index')->name( 'home' );
Route::get('/home', 'Front\Home@index');

/**
 * Admin site
 */

/** Group for admin namespace */
Route::namespace('Admin')
->prefix('admin')
/** @deprecated middleware prevent-back-history */
->middleware(['auth', 'prevent-back-history'])
->group(function () {

    /** Defaul controller for admin site */
    Route::get('/', 'DashboardController@index')->name( 'dashboard.index' );

    /** Dashboard page */
    Route::get( 'dashboard', 'DashboardController@index' );

    /** Users page */
    Route::resource('users', 'UsersController');

    /** Roles page */
    Route::resource('roles', 'RolesController');

    /** Permissions page */
    Route::resource('permissions', 'PermissionsController');

    /** Permissions page */
    Route::resource('users_config', 'UsersConfigController', ['only' => [
        'index',
        'update'
        ]]);
});
