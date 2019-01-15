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

/*
 * Auth routes
 */
Route::middleware('clear-cache')
->group(function () {
    Auth::routes();
});


/*
 * Public site
 */

/* Group for Public namespace */
Route::namespace('Front')
->group(function () {


    /* Default controller for front site */
    Route::get('/', 'Home@index')->name( 'home' );
    Route::get('/home', 'Home@index');

    try {
        $categories = \App\Models\Category::pluck('slug')->implode('|');
    } catch (\Exception $e) {
        $categories = 'default';
    }

    Route::get('/{category}', 'BlogController@category')->where('category', $categories)->name('blog.category');

    Route::get('/{category}/{slug}', 'BlogController@single')->where('category', $categories)->name('blog.single');
});


/*
 * Admin site
 */

/* Group for Admin namespace */
Route::namespace('Admin')
->prefix('admin')
->middleware(['auth', 'clear-cache', 'inactive', 'password-expire'])
->group(function () {

    /* Default controller for the admin site */
    Route::get('/', 'DashboardController@index')->name('admin');

    /* Dashboard page */
    Route::get( 'dashboard', 'DashboardController@index' )->name( 'dashboard.index' );


    /*
     * Emails module
     */

    /* Resource routes */
    Route::resource('emails', 'EmailsController');

    /* Emails folders */
    Route::get('sent_emails', 'EmailsController@sentEmails')->name('emails.sent');
    Route::get('draft_emails', 'EmailsController@draftEmails')->name('emails.draft');
    Route::get('trashed_emails', 'EmailsController@trashedEmails')->name('emails.trash');

    /* Restore emails */
    Route::patch('emails/{id}/restore', 'EmailsController@restore')->name('emails.restore');


    /*
     * Access section
     */

    /* Users module */
    Route::resource('users', 'UsersController');

    /* Roles module */
    Route::resource('roles', 'RolesController')->except('show');

    /* Permissions module */
    Route::resource('permissions', 'PermissionsController')->only([
        'index',
        'edit',
        'update',
    ]);


    /*
     * Content section
     */

    /* Articles module */
    Route::resource('articles', 'ArticlesController')->except('show');
    Route::get('articles/archived', 'ArticlesController@archived')->name('articles.archived');
    Route::get('articles/highlighted', 'ArticlesController@highlighted')->name('articles.highlighted');

    /* Categories module */
    Route::resource('categories', 'CategoriesController')->except('show');

    /* Menus module */
    Route::resource('menus', 'MenusController')->except('show');


    /*
     * Configs section
     */
    Route::resource('configs', 'ConfigsController')->only([
        'index',
        'update',
    ]);
    
    Route::get('configs/site', 'ConfigsController@site')->name('configs.site');


});
