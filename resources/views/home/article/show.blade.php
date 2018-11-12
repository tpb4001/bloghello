<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>show</title>
<meta name="keywords" content="">
<meta name="description" content=""> 
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/nprogress.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/style.css">
 <link rel="stylesheet" type="text/css" href="/HomeStyle/css/pl.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/HomeStyle/images/icon.png">
<link rel="shortcut icon" href="/HomeStyle/images/favicon.ico">
<script src="/HomeStyle/css/jquery-2.1.4.min.js"></script>
<script src="/HomeStyle/css/nprogress.js"></script>
<script src="/HomeStyle/css/jquery.lazyload.min.js"></script>
<script src="/HomeStyle/js/pl.js"></script>
<!--[if gte IE 9]>
<script src="/HomeStyle/css/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="/HomeStyle/css/html5shiv.min.js" type="text/javascript"></script>
<script src="/HomeStyle/css/respond.min.js" type="text/javascript"></script>
<script src="/HomeStyle/css/selectivizr-min.js" type="text/javascript"></script>
<![endif]
<!--[if lt IE 9]>
/background//HomeStyle/js/<script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>
<body class="user-select single">
<header class="header">
<nav class="navbar navbar-default" id="navbar">
<div class="container">
  <div class="header-topbar hidden-xs link-border">
	<ul class="site-nav topmenu">
	  <li><a href="#" >标签云</a></li>
		<li><a href="#" rel="nofollow" >读者墙</a></li>
		<li><a href="#" title="RSS订阅" >
			<i class="fa fa-rss">
			</i> RSS订阅
		</a></li>
	</ul>
	勤记录 懂分享</div>
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
	  <li><a data-cont="木庄网络博客" title="木庄网络博客" href="/">首页</a></li>
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
<section class="container">
<div class="content-wrap">
<div class="content">
  <header class="article-header">
	<h1 class="article-title"><a href="#" title="{{$article->title}}" >{{$article->title}}</a></h1>
	<div class="article-meta"> <span class="item article-meta-time">
	  <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间：{{ $article->create_at }}"><i class="glyphicon glyphicon-time"></i> {{ $article->create_at }}</time>
	  </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="来源：bloghello博客"><i class="glyphicon glyphicon-globe"></i> bloghello博客</span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="MZ-NetBlog主题"><i class="glyphicon glyphicon-list"></i> <a href="#" title="MZ-NetBlog主题" >BlogHello</a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：219"><i class="glyphicon glyphicon-eye-open"></i> 219</span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> {{ $article->articleinfo->path }}</span> </div>
  </header>
  <article class="article-content">
	<p><img data-original="/HomeStyle/images/logo3.png" src="/HomeStyle/images/logo3.png" alt="" /></p>
	<p>{!! $article->articleinfo->article !!}</p>
	
	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a></div>

		  <script>                  window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "32" }, "share": {} }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api//HomeStyle/css/share.js?v=0.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
  </article>
  
	</div>
  <div class="relates">
	<div class="title">
	  <h3>相关推荐</h3>
	</div>
	<ul>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	  <li><a href="#" title="" >用DTcms做一个独立博客网站（响应式模板）-MZ-NetBlog主题</a></li>
	</ul>
  </div>
  <div class="title" id="comment">
	<h3>评论</h3>
  </div>
  <div id="respond">
		<form id="comment-form" name="comment-form" action="/pinglun" method="POST">
			{{ csrf_field() }}
			<div class="comment">
				<input type="hidden" name="aid" value="{{ $article->id}}">
				<input type="hidden" name="uname" value="{{ session('uname') }}">
				<div class="comment-box">
					<textarea placeholder="说点什么吧（登录即可评论）" name="pinglun" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
					<div class="comment-ctrl">
						<div class="comment-prompt" style="display: none;"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text">评论正在提交中...请稍后</span> </div>
						<div class="comment-success" style="display: none;"> <i class="fa fa-check"></i> <span class="comment-prompt-text">评论提交成功...</span> </div>
						<button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
					</div>
				</div>
			</div>
		</form>
		
	</div>

  <div id="postcomments" style="margin-top: 50px;">

	<ol id="comment_list" class="commentlist">  
		@foreach($article_pl as $k=>$v)      
		<li class="comment-content">
			<span class="comment-f">{{ $k+1 }}</span>
			<div class="comment-main">
				<p>
					<a class="address" href="#" rel="nofollow" target="_blank">{{ $v->user->uname }}</a>
					<span class="time">({{ $v->created_at }})</span><br>
					{{ $v->pinglun }}
				</p>
				
			</div>
		</li>
		@endforeach
	</ol>

  </div>
</div>
</div>
<aside class="sidebar">
<div class="fixed">
  <div class="widget widget-tabs">
	<ul class="nav nav-tabs" role="tablist">
	  <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" draggable="false">统计信息</a></li>
	  <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab" draggable="false">联系站长</a></li>
	</ul>
	<div class="tab-content">
	  <div role="tabpanel" class="tab-pane contact active" id="notice">
		<h2>日志总数:
			  888篇
		  </h2>
		  <h2>网站运行:
		  <span id="sitetime">88天 </span></h2>
	  </div>
		<div role="tabpanel" class="tab-pane contact" id="contact">
		  <h2>QQ:
			  <a href="" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="" draggable="false" data-original-title="QQ:577211782">577211782</a>
		  </h2>
		  <h2>Email:
		  <a href="mailto:577211782@qq.com" target="_blank" data-toggle="tooltip" rel="nofollow" data-placement="bottom" title="" draggable="false" data-original-title="Email:577211782@qq.com">577211782@qq.com</a></h2>
	  </div>
	</div> 
  </div>
  <div class="widget widget_search">
	<form class="navbar-form" action="/Search" method="post">
	  <div class="input-group">
		<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
	</form>
  </div>
</div>
<div class="widget widget_hot">
	 <h3>此博主其他文章</h3>
	 
	<ul>

	<li><a title="用DTcms做一个独立博客网站（响应式模板）" href="#" ><span class="thumbnail">
	<img class="thumb" data-original="/HomeStyle/images/201610181739277776.jpg" src="/HomeStyle/images/201610181739277776.jpg" alt="用DTcms做一个独立博客网站（响应式模板）"  style="display: block;">
	</span><span class="text"></span><span class="muted"><i class="glyphicon glyphicon-time"></i>
	2016-11-01
	</span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i>88</span></a></li>

	  </ul>
  </div>

  <div class="widget widget_sentence">

<a href="#" target="_blank" rel="nofollow" title="专业网站建设" >
	<img style="width: 100%" src="/HomeStyle/images/201610241224221511.jpg" alt="专业网站建设" ></a>

</div>
</aside>
</section>
<footer class="footer">
<div class="container">
 <p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> </p>
</div>
<div id="gotop"><a class="gotop"></a></div>
</footer>
<script src="/HomeStyle/css/bootstrap.min.js"></script>
<script src="/HomeStyle/css/jquery.ias.js"></script>
<script src="/HomeStyle/css/scripts.js"></script>
</body>
</html>
