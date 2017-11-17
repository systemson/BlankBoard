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

/** Group for Public namespace */
/** @todo  rename namespace to "Public" */
Route::namespace('Front')
->group(function () {
    /** Default controller for front site */
    Route::get('/', 'Home@index')->name( 'home' );
    Route::get('/home', 'Home@index');
});


/**
 * Admin site
 */

/** Group for Admin namespace */
Route::namespace('Admin')
->prefix('admin')
->middleware(['auth', 'clear-cache', 'inactive'])
->group(function () {

    /** Default controller for admin site */
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


    /**
     * Emails module
     */

    /** Restore emails */
    Route::patch('emails/{id}', 'EmailsController@restore')->name('emails.restore');

    /** Resource routes */
    Route::resource('emails', 'EmailsController');

    /** Emails folders */
    Route::get('sent_emails', 'EmailsController@sentEmails')->name('emails.sent');
    Route::get('draft_emails', 'EmailsController@draftEmails')->name('emails.draft');
    Route::get('trashed_emails', 'EmailsController@trashedEmails')->name('emails.trash');

});
