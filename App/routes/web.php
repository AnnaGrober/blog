<?php

Route::get('/', "indexController@getIndex");

Route::get('/category', "categoryController@category");

Route::get('/category/{id}',"categoryController@getDetails");

Route::get('/create',"categoryController@create" );

Route::post('/create/add',"categoryController@store" );

Route::get('/redactor',"RedactorController@getRed" );

Route::get('/forum',"ForumController@getForum" );

