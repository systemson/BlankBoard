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
Route::middleware('clear-cache')
->group(function () {
    Auth::routes();
});


/**
 * Public site
 */

/** Default controller for front site */
Route::namespace('Front')
->group(function () {
    Route::get('/', 'Home@index')->name( 'home' );
    Route::get('/home', 'Home@index');
});


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

    /** Roles page */
    Route::resource('roles', 'RolesController')->except('show');

    /** Permissions page */
    Route::resource('permissions', 'PermissionsController')->only([
        'index',
        'edit',
        'update',
    ]);
});
