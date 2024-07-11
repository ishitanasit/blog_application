<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
        
    });

    Route::group(['prefix'=> 'user','middleware' => ['auth']], function () {
        /**
         * Logout Route
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        
        /**
         * Blog Routes
         */
        Route::get('/blog/create', 'BlogController@create')->name('blog.create');
        Route::post('/blog/store', 'BlogController@store')->name('blog.store');
        Route::get('/blog/show', 'BlogController@show')->name('blog.show');
        Route::get('/blog/{id}/edit', 'BlogController@edit')->name('blog.edit');
        Route::put('/blog/{id}', 'BlogController@update')->name('blog.update');
        Route::delete('/blog/{id}', 'BlogController@destroy')->name('blog.destroy');
    });
    Route::group(['prefix'=> 'admin','middlekware' => ['auth']], function() {
        Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
    });
});