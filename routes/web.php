<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware'=>'auth'],function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/categories','CatgController');
Route::resource('/posts','PostController');
Route::resource('/tags','TagsController');
Route::get('/Trashed-posts', 'PostController@trash')->name('trashed.index');
Route::get('/restore-post/{id}', 'PostController@restore')->name('restore');
    
    
});