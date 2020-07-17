<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HelloController@index');

Route::get('about', 'HelloController@about')->name('about');
Route::get('contact', 'HelloController@contact')->name('contact');
Route::get('post', 'HelloController@post')->name('post');
Route::get('addCategory', 'HelloController@addCategory')->name('addCategory');
Route::post('storeCategory', 'HelloController@storeCategory');
Route::get('allCategory', 'HelloController@allCategory')->name('allCategory');
Route::get('viewCategory/{id}', 'HelloController@viewCategory');
Route::get('deleteCategory/{id}', 'HelloController@deleteCategory');
Route::get('editCategory/{id}', 'HelloController@editCategory');
Route::post('updateCategory/{id}', 'HelloController@updateCategory');
Route::post('storePost', 'HelloController@storePost')->name('storePost');
Route::get('allPost', 'HelloController@allPost')->name('allPost');
Route::get('viewPost/{id}', 'HelloController@viewPost');
Route::get('editPost/{id}', 'HelloController@editPost');
Route::post('updatePost/{id}', 'HelloController@updatePost');
Route::get('deletePost/{id}', 'HelloController@deletePost');
Route::get('createStudent', 'HelloController@createStudent')->name('createStudent');
Route::post('storeStudent', 'HelloController@storeStudent');
Route::get('allStudent', 'HelloController@allStudent')->name('allStudent');
Route::get('viewStudent/{id}', 'HelloController@viewStudent');
Route::get('deleteStudent/{id}', 'HelloController@deleteStudent');
Route::get('editStudent/{id}', 'HelloController@editStudent');
Route::post('updateStudent/{id}', 'HelloController@updateStudent');