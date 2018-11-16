<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog Hello</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/nprogress.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/style.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="images/icon.png">
<link href="/HomeStyle/css/zzsc.css" rel="stylesheet" type="text/css"   />
<link rel="shortcut icon" href="images/favicon.ico">
<script src="/HomeStyle/js/jquery-2.1.4.min.js"></script>
<script src="/HomeStyle/js/nprogress.js"></script>
<script src="/HomeStyle/js/jquery.lazyload.min.js"></script>
<!--[if gte IE 9]>
  <script src="/HomeStyle/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="/HomeStyle/js/html5shiv.min.js" type="text/javascript"></script>
  <script src="/HomeStyle/js/respond.min.js" type="text/javascript"></script>
  <script src="/HomeStyle/js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>
<body class="user-select">

	<header class="header">
	<nav class="navbar navbar-default" id="navbar">
		<div class="container">
			<div class="header-topbar hidden-xs link-border">
				<ul class="site-nav topmenu">
					@if(empty(session('uname')))
						<li>
							<a href="/login" rel="nofollow" >登录</a>
						</li>
						<li>
							<a href="/login/create" title="注册" >注册</a>
						</li>
					@elseif(session('Identity') == 2)
						<li>
				  		<a href="/Bdetalis" >{{ session('uname') }}</a>
					 	</li>
						<li>
							<a href="/login/esc" title="退出" >退出</a>
						</li>
					@else
						<li>
				  		<a href="/Pdetalis" >{{ session('uname') }}</a>
					 	</li>
						<li>
							<a href="/login/esc" title="退出" >退出</a>
						</li>
					@endif
				</ul>
				勤记录 懂分享 
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<h1 class="logo hvr-bounce-in"><a href="/" title="Blog Hello"><img src="/HomeStyle/images/201610171329086541.png" alt="Blog Hello"></a></h1>
			</div>
		  	<div class="collapse navbar-collapse" id="header-navbar">
				<!-- 搜索 开始 -->
				<form class="navbar-form visible-xs" action="/Search" method="post">
				  <div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
					<span class="input-group-btn">
						<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
					</span> 
				  </div>
				</form>
				<!-- 搜索 结束 -->
				<!-- 导航栏 开始 -->
				<ul class="nav navbar-nav navbar-right">
				  <li><a data-cont="Blog Hello" title="首页" href="/">首页</a></li>
				  @foreach($common_cates_data as $k=>$v)
				  <li><a data-cont="{{ $v->cname }}" title="{{ $v->cname }}" href="/list/{{ $v->id }}">{{ $v->cname }}</a></li>
				  @endforeach
				  <li><a data-cont="话题中心" title="话题中心" href="/topic">话题中心</a></li>
				  <li><a data-cont="留言板" title="留言板" href="/">留言板</a></li>
				</ul>
				<!-- 导航栏 结束 -->
		  	</div>
		</div>
		</nav>
	</header>
<!-- 内容 开始 -->
	<section class="container">
		@section('content')

		@show
		</div>
	</section>
<!-- 内容 结束 -->
<!-- 页脚 开始 -->
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; 2016.Company name All rights reserved.</p>
		</div>
		<div id="gotop"><a class="gotop"></a></div>
	</footer>
<!-- 页脚 结束 -->
<script src="/HomeStyle/js/bootstrap.min.js"></script>
<script src="/HomeStyle/js/jquery.ias.js"></script>
<script src="/HomeStyle/js/scripts.js"></script>
<li id="rightClickMenu"></li>
</body>
</html>
