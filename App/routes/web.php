<?php



Route::get('/', "IndexController@getIndex");

Route::get('/reg', function (){
    return  view('/reg');
});
Route::get('/category', "categoryController@category");
Route::get('/category/{id}',"categoryController@getDetails");
Route::post('/create/add',"categoryController@store" );
Route::get('/forum',"ForumController@getSubject" );
Route::post('/forum_create',"ForumController@create" );
Route::post('/forum_open_create',"ForumController@forum_open_create" );
Route::get('/forum/{id}',"ForumController@forum_open" );
Route::post('/reg','UserCpController@user_store');

Auth::routes();
Route::group(['middleware'=>'block'], function () {
    Route::get('/ch',"IndexController@message");
});
Route::group(['middleware'=>'admin'], function () {
    Route::get('/admin_panel','AdminController@panel');
    Route::post('/admin_panel','AdminController@panel')->name('find.post');
    Route::post('/admin_panel','AdminController@block1')->name('test.post');
});
Route::group(['middleware'=>'redactor'], function () {
    Route::get('/redactor',"RedactorController@getRed" );

    Route::get('/SelectForUpdate',"RedactorController@getAll" );

    Route::get('/SelectForUpdate/set',"RedactorController@get_set" );

    Route::get('/SelectForUpdate/run',"RedactorController@get_run" );

    Route::get('/SelectForUpdate/comp',"RedactorController@get_comp" );

    Route::get('/SelectForUpdate/comp_time',"RedactorController@get_comp_time" );
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/create',"categoryController@create" );
    Route::get('/messages',"messageController@get_messages" );
    Route::get('/update/{id}',"categoryController@update" );
    Route::get('/del/{id}',"categoryController@del" );
    Route::post('/update/add/{id}',"categoryController@up" );
//    Route::get('/{user}/', 'UserCpController@get_info');
    Route::get('/{user}', 'UserCpController@get_info');
    Route::get('/{user}/project', 'UserCpController@get_project');
    Route::post('/modal', 'UserCpController@avaUpload');
    Route::post('/user_cp','UserCpController@store_about')->name('about.post');
    Route::post('/create/add',"categoryController@store" );
    Route::post('/category/post',"categoryController@feedback");

    Route::post('/forum_create',"ForumController@store" );
    Route::post('/forum_open_create',"ForumController@store_mes" );

    Route::post('/updating_subject', "ForumController@update_save" );

});

