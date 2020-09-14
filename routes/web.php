<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'AppController@index' );
//Route::view('/', 'layouts.master');

//Route::view('/{path?}', 'app');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

/** Standard Routes */
Route::resource('home', 'CompanyController');

/* API */
Route::resource('api/company', 'CompanyController');
Route::resource('api/contact', 'ContactController');
Route::resource('api/task', 'TaskController');

/* API for combined actions */
Route::get('api/company/{id}/contact', 'CompanyContactController@company_details');
Route::get('api/company/{company_id}/contact/{id}', 'CompanyContactController@contact_details');
Route::get('api/company/{company_id}/contact/{contact_id}/task/{id}', 'CompanyContactController@task_details');

