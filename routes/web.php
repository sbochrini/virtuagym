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
Route::get('/', 'PlanController@index');

Route::resource('plans', 'PlanController');

Route::resource('plandays', 'PlandayController');

//Route::get('/', 'UserController@index');

Route::resource('users', 'UserController');

Route::post('plans/addplanform', 'PlanController@addplanform');

Route::post('plans/addplanday', 'PlanController@addplanday');

Route::post('plans/store', 'PlanController@store');

Route::post('plans/{id}/edit/', 'PlanController@edit');

Route::get('plans/{id}/delete/', 'PlanController@delete');

Route::post('plans/{id}/update', 'PlanController@update');

Route::post('users/adduserform', 'UserController@adduserform');

Route::get('users/{id}/delete/', 'UserController@delete');

//Route::post('plans/create', 'PlanController@create');
//Route::get('plans/store', 'PlanController@planli');

//Route::get('users/{id}', 'UserController@show');