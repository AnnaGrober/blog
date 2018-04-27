<?php

Route::get('/', "indexController@getIndex");

Route::get('/category', "categoryController@category");

Route::get('/category/{id}',"categoryController@getDetails");



Route::get('/redactor',"RedactorController@getRed" );

Route::get('/SelectForUpdate',"RedactorController@getAll" );

Route::get('/update/{id}',"categoryController@update" );

Route::get('/del/{id}',"categoryController@del" );

Route::post('/update/add/{id}',"categoryController@up" );

Route::get('/forum',"ForumController@getForum" );



Route::get('/login', function (){
    return  view('/auth/login');
});
Route::get('/reg', function (){
    return  view('/reg');
});
Route::post('/reg','UserCpController@user_store');
//Route::get('/reg', 'UserCpController@reg');
Auth::routes();
Route::group(['middleware'=>'auth','admin'],function () {
    Route::get('/admin_panel','AdminController@panel');
    Route::post('/admin_panel','AdminController@block');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
//    Route::get('/{user}/', 'UserCpController@get_info');
    //Route::get('/{user}', 'UserCpController@get_info');

    Route::get('/create',"categoryController@create");

    Route::post('/create/add',"categoryController@store" );

    Route::post('/category/post',"categoryController@feedback");
});

