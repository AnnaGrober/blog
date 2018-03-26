<?php

Route::get('/', "indexController@getIndex");

Route::get('/category', "categoryController@getCategory");

Route::get('/category/{id}',"categoryController@getDetails");

Route::get('/create',"categoryController@create" );

Route::get('/forum',"ForumController@getForum" );

