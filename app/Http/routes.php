<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 后台首页
Route::get('/admin','Admin\IndexController@index');
// 用户管理
Route::resource('/admin/users','Admin\UsersController');
// 分类管理
Route::resource('/admin/cates','Admin\CatesController');
// 标签管理
Route::resource('/admin/tags','Admin\TagsController');
// 公告管理
Route::resource('/admin/notice','Admin\NoticeController');
// 友情链接
Route::resource('/admin/link','Admin\LinksController');
// 文章管理
Route::resource('/admin/article','Admin\ArticleController');
// 留言管理
Route::resource('/admin/message','Admin\MessageController');
// 用户举报
Route::resource('/admin/report','Admin\ReportController');
