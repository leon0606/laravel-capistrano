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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegisterController@register');
Route::get('/register', 'RegisterController@index');

// 用户模块
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/logout', 'LoginController@logout');
    Route::get('/user/me/setting', 'UserController@setting');
    Route::post('/user/me/setting', 'UserController@settingStore');
});

// 文章模块
Route::group(['prefix' => 'posts', 'middleware' => ['auth:web']], function () {
// 文章列表页
    Route::get('', 'PostController@index');
// 创建文章
    Route::get('/create', 'PostController@create');
    Route::post('', 'PostController@store');
// 文章详情页
    Route::get('/{post}', 'PostController@show');
// 编辑文章
    Route::get('/{post}/edit', 'PostController@edit');
    Route::put('/{post}', 'PostController@update');
// 删除文章
    Route::get('/{post}/delete', 'PostController@delete');
    // 图片上传
    Route::post('/image/upload', 'PostController@imageUpload');
    // 评论
    Route::post('/{post}/comment', 'PostController@comment');

});



