<?php



Route::get('/', "IndexController@getIndex");

Route::get('livesearch','DemoController@liveSearch');

Route::get('headerNavigetion','DemoController@category');

Route::get('/reg', function (){
    return  view('/reg');
});
Route::get('/category', "categoryController@category");
Route::get('/category/type/{id}', "categoryController@category");

Route::get('/category/{id}',"categoryController@getDetails");
Route::post('/create/add',"categoryController@store" );
Route::get('/forum',"ForumController@getSubject" );
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
    Route::get('/project_user/{id}', 'UserCpController@get_project_users');
    Route::post('/modal', 'UserCpController@avaUpload');
    Route::post('/user_cp','UserCpController@store_about')->name('about.post');
    Route::post('/create/add',"categoryController@store" );
    Route::post('/category/post',"categoryController@feedback");

    Route::post('/forum_create',"ForumController@store" );
    Route::post('/forum_open_create',"ForumController@store_mes" );

    Route::post('/updating_subject', "ForumController@update_save" );
    Route::post('/updating_massage/{id}', "ForumController@update_save_mes" );
    Route::get('/del_subject_for_forum/{id}', "ForumController@del_subj" );
    Route::get('/del_message_for_forum/{id}', "ForumController@del_mes" );
    Route::get('forum/{id}/images','ForumController@image');
});

