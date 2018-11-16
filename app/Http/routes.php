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
	/**
	*	公共数据
	*		account //后台登录用户的信息
	*		common_cates_data //共享前台分类处理
	*/

// 前台登录
Route::get('/login','Home\LoginController@index');
Route::post('/login/yz','Home\LoginController@yz');
// 退出登录
Route::get('/login/esc','Home\LoginController@esc');

// 用户注册
Route::get('/login/create','Home\LoginController@create');
// 判断手机号是否注册
Route::get('/login/rephone','Home\LoginController@rephone');
// 判断账户是否注册
Route::get('/login/reuname','Home\LoginController@reuname');
// 验证码
Route::get('/login/sendMobileCode','Home\LoginController@sendMobileCode');
Route::post('/login/store','Home\LoginController@store');


// 前台页面
Route::get('/','Home\IndexController@index');
// 文章详情
Route::resource('/article','Home\IndexController');
// 列表页
Route::get('/list/{id}','Home\IndexController@list');
// 文章评论
Route::resource('/pinglun','Home\Article_plController');
// 话题详情
Route::resource('/topic','Home\TopicController');
// 话题评论
Route::resource('/comment','Home\CommentController');

// 修改密码
Route::post('/Pdetalis/Cpass','Home\PdetalisController@Cpass');
// 个人详情	
Route::resource('/Pdetalis','Home\PdetalisController');
// 头像修改
Route::post('/Bdetalis/uploads','Home\BdetalisController@uploads');
// 博主详情
Route::resource('/Bdetalis','Home\BdetalisController');
	// 博主文章管理
	Route::resource('/detalis/article','Home\ArticleController');
	// 相册上传
	Route::post('/myalbum/uploads','Home\AlbumController@uploads');
	// 博主相册管理
	Route::resource('/myalbum','Home\AlbumController');

// 留言管理
Route::resource('/message','Home\MessageController');



// 后台登录
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login/ACname','Admin\LoginController@ACname');
// 后台登录中间件
Route::group(['middleware' => 'admin'],function()
{
	// 退出后台登录
	Route::get('/admin/login/esc','Admin\LoginController@esc');
	// 后台首页
	Route::resource('/admin/index','Admin\IndexController');
	// 用户管理
		// 管理员
		Route::get('/admin/users/Administrators','Admin\UsersController@Administrators');
		// 博主
		Route::get('/admin/users/Blogger','Admin\UsersController@Blogger');
			// 博主个人文章
			Route::get('/admin/users/Particle/{id}','Admin\UsersController@Particle');
		// 普通用户
		Route::get('/admin/users/OrdinaryUser','Admin\UsersController@OrdinaryUser');
	// 用户增删改
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
	// 文章评论
	Route::resource('/admin/pinglun','Admin\Article_plController');
	// 留言管理
	Route::resource('/admin/message','Admin\MessageController');
	// 用户举报
	Route::resource('/admin/report','Admin\ReportController');
	// 轮播图
	Route::resource('/admin/image','Admin\ImageController');
	// 话题管理
	Route::resource('/admin/topic','Admin\TopicController');
	// 广告管理
	Route::resource('/admin/advert','Admin\AdvertsController');

});
