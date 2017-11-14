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
->middleware(['auth', 'clear-cache', 'inactive'])
->group(function () {

    /** Defaul controller for admin site */
    Route::get('/', 'DashboardController@index')->name('admin');

    /** Dashboard page */
    Route::get( 'dashboard', 'DashboardController@index' )->name( 'dashboard.index' );

    /** Users module */
    Route::resource('users', 'UsersController');

    /** Roles module */
    Route::resource('roles', 'RolesController')->except('show');

    /** Permissions module */
    Route::resource('permissions', 'PermissionsController')->only([
        'index',
        'edit',
        'update',
    ]);

    /** Messages module */
    Route::resource('emails', 'EmailsController');
    Route::get('sent_emails', 'EmailsController@sentEmails')->name('emails.sent');
    Route::get('draft_emails', 'EmailsController@draftEmails')->name('emails.draft');
    Route::get('trashed_emails', 'EmailsController@trashedEmails')->name('emails.trash');

});
