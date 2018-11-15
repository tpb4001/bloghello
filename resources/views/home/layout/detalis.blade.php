<!DOCTYPE html>
</body>
</html>
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
<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/js/bootstrap.min.js">
<script src="/HomeStyle/js/jquery-2.1.4.min.js"></script>
<script src="/HomeStyle/js/nprogress.js"></script>
<script src="/HomeStyle/js/jquery.lazyload.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">



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
				勤记录 懂分享
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<h1 class="logo hvr-bounce-in"><a href="/"><img src="/HomeStyle/images/201610171329086541.png" alt="木庄网络博客"></a></h1>
			</div>
		 	<!-- 导航栏 开始 -->
		  	<div class="collapse navbar-collapse" id="header-navbar">
				<ul class="nav navbar-nav navbar-right">
				@section('Dh');
				  
				@show
				</ul>
		  	</div>
		 	<!-- 导航栏 结束 -->
		</div>
		</nav>
	</header>
<!-- 导航栏 结束 -->
<!-- 内容 开始 -->
	<section class="container">
		<!-- 读取提示信息 开始 -->
          @if (session('success'))
          	<div class="alert alert-success" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  {{ session('success') }}
			</div>
          @endif

          @if (session('error'))
         	<div class="alert alert-danger" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  {{ session('success') }}
			</div>
          @endif
        <!-- 读取提示信息 结束 -->
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
