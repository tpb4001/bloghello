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
<!-- 导航栏 开始 -->
	<header class="header">
	<nav class="navbar navbar-default" id="navbar">
		<div class="container">
			<div class="header-topbar hidden-xs link-border">
				<ul class="site-nav topmenu">
				  	<li>
				  		<a href="#" >用户名</a>
				 	</li>
					<li>
						<a href="#" rel="nofollow" >关注信息</a>
					</li>
					<li>
						<a href="#" title="RSS订阅" >
							<i class="fa fa-rss"></i> 退出
						</a>
					</li>
				</ul>
				勤记录 懂分享
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<h1 class="logo hvr-bounce-in"><a href="#" title="木庄网络博客"><img src="/HomeStyle/images/201610171329086541.png" alt="木庄网络博客"></a></h1>
			</div>
		  <div class="collapse navbar-collapse" id="header-navbar">
			<form class="navbar-form visible-xs" action="/Search" method="post">
			  <div class="input-group">
				<input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
				<span class="input-group-btn">
				<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
				</span> </div>
			</form>
			<ul class="nav navbar-nav navbar-right">
			  <li><a data-cont="木庄网络博客" title="木庄网络博客" href="index.html">首页</a></li>
			  <li><a data-cont="列表页" title="列表页" href="list.html">列表页</a></li>
			  <li><a data-cont="详细页" title="详细页" href="show.html">详细页</a></li>
			  <li><a data-cont="404" title="404" href="404.html">404</a></li>
			  <li><a data-cont="MZ-NetBolg主题" title="MZ-NetBolg主题" href="#" >MZ-NetBolg主题</a></li>
			  <li><a data-cont="IT技术笔记" title="IT技术笔记" href="#" >IT技术笔记</a></li>
			  <li><a data-cont="源码分享" title="源码分享" href="#" >源码分享</a></li>
			  <li><a data-cont="靠谱网赚" title="靠谱网赚" href="#" >靠谱网赚</a></li>
			  <li><a data-cont="资讯分享" title="资讯分享" href="#" >资讯分享</a></li>
			</ul>
		  </div>
		</div>
		</nav>
	</header>
<!-- 导航栏 结束 -->
<!-- 内容 开始 -->
		@section('content')

		@show
		</div>
	</section>
<!-- 内容 结束 -->
<!-- 页脚 开始 -->
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
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
