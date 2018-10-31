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
// 后台用户路由
Route::resource('/admin/users','Admin\UsersController');
// 添加分类
Route::resource('/admin/cates','Admin\CatesController');
// 添加标签
Route::resource('/admin/tags','Admin\TagsController');
// 添加公告
Route::resource('/admin/notice','Admin\NoticeController');
// 友情链接
Route::resource('/admin/link','Admin\LinksController');




























































Route::get('/admin','Admin\IndexController@index');
Route::resource('/admin/category','Admin\CategoryController');