<?php

Route::get('/', "indexController@getIndex");

Route::get('/category', "categoryController@getCategory");

Route::get('/category/{id}',"categoryController@getDetails");

Route::get('/create',"categoryController@create" );

Route::post('/create/add',"categoryController@store" );

Route::get('/forum',"ForumController@getForum" );


