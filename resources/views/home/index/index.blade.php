@extends('home.layout.index')

@section('content')
	<section class="container">
<div class="content-wrap">
<div class="content">
	<div id="focusslide" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			
			<li data-target="#focusslide" data-slide-to="0" class="active"></li>
			@for($i=1; $i <= $lbt; $i++)
			<li data-target="#focusslide" data-slide-to="{{ $i }}"	></li>
			@endfor
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<a href="#" target="_blank" title="" draggable="false">
				<img src="/HomeStyle/images/logo6.png" alt="" class="img-responsive" draggable="false"></a>
			</div>
			@foreach($image as $k=>$v)
			<div class="item">
				<a href="#" target="_blank" title="{{ $v->iname }}" draggable="false">
				<img src="{{ $v->img }}" style="width:820px;height:200px;border-radius:0px;" alt="{{ $v->iname }}" class="img-responsive" draggable="false"></a>
			</div>
			@endforeach
		</div>
		<a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow" draggable="false"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow" draggable="false"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> 
	</div>
	<!-- 推荐位  开始 -->
  	<article class="excerpt-minic excerpt-minic-index">
		<h2><span class="red">【推荐】</span><a target="_blank" href="#" title="用DTcms做一个独立博客网站（响应式模板）" draggable="false">用DTcms做一个独立博客网站（响应式模板）</a>
		</h2>
		<p class="note">用DTcms做一个独立博客网站（响应式模板），采用DTcms V4.0正式版（MSSQL）。开发环境：SQL2008R2+VS2010。DTcms V4.0正式版功能修复和优化：1、favicon.ico图标后台上传。（解决要换图标时要连FTP或者开服务器的麻烦）</p>
	</article>
	<!-- 推荐位  结束 -->
  <div class="title">
	<h3>最新发布</h3>
  </div>
  <!-- 文章内容 开始 -->
  @foreach ($article as $k=>$v) 
  	<article class="excerpt excerpt-1" style="">
  		<a class="focus" href="#" title="{{ $v->title }}" target="_blank" draggable="false"><img class="thumb" data-original="images/logo1.png" src="/HomeStyle/images/logo1.png" alt="{{ $v->title }}" style="display: inline;" draggable="false"></a>
		<header><a class="cat" href="#" title="MZ-NetBlog主题" draggable="false">BlogHello博客<i></i></a>
			<h2><a href="/article/{{ $v->id }}" title="{{ $v->title }}" target="_blank" draggable="false">{{ $v->title }}</a>
			</h2>
		</header>
		<p class="meta">
			<time class="time"><i class="glyphicon glyphicon-time"></i> {{ $v->created_at }}</time>
			<span class="views"><i class="glyphicon glyphicon-eye-open"></i> {{ $v->articleinfo->path }}</span> <a class="comment" href="##comment" title="评论" target="_blank" draggable="false"><i class="glyphicon glyphicon-comment"></i> 4</a>
		</p>
		<div style="height: 120px;overflow: hidden;">
			{!! $v->articleinfo->article !!}	
		</div>
	</article>
  @endforeach
  <!-- 文章内容 结束 -->
</div>
<div id="fy" style="width: 600px;height: 50px;" >
	{!! $article->render() !!}
</div>
<script type="text/javascript">
	$(function(){
		$('.pagination').removeAttr('style') ;
		$('.pagination').attr('style','padding-top: 0px; padding-left: 0px;') ;
	});
</script>
</div>

<aside class="sidebar">
<div class="fixed">
	<div class="widget widget-tabs">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" draggable="false">公告</a></li>
			<li role="presentation"><a href="#tagscloud" aria-controls="tagscloud" role="tab" data-toggle="tab" draggable="false">标签云</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane contact active" id="notice">
				<h4 style="text-align: center;">{{ $ljg->title }}</h4>
				<h5>{!! $ljg->content !!}</h5>
			</div>
				<div role="tabpanel" class="tab-pane contact" id="tagscloud">
					@foreach ($tags as $k=>$v)
						<a href="http://{{ $v->url }}" target="_blank" class="{{ $v->tagsclass }}">{{ $v->tname }}</a>
					@endforeach
				</div>
				<script src='/HomeStyle/js/zzsc.js' type="text/javascript"></script>
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
	  <h3>话题讨论</h3>
	  <ul> 
	  	    @foreach ($topic as $k=>$v)       
			<li><a title="{{ $v->title }}" href="/topic/{{ $v->id }}" draggable="false"><span class="thumbnail">
				<img class="thumb" data-original="/HomeStyle/images/201610181739277776.jpg" src="/HomeStyle/images/201610181739277776.jpg" alt="{{ $v->title }}" style="display: block;" draggable="false">
			</span><span class="text">{{ $v->title }}</span><span class="muted"><i class="glyphicon glyphicon-time"></i>
				{{ $v->created_at }}
			</span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i>{{ $v->path }}</span></a></li>
			@endforeach

	  </ul>
 </div>
 <div class="widget widget_sentence">
 	<h3>广告</h3>
 	 @foreach ($advert as $k=>$v)   
	<a href="{{ $v->url }}" target="_blank" rel="nofollow" title="{{ $v->aname }}" draggable="false">
	<img style="width: 100%" src="{{ $v->image }}" alt="{{ $v->aname }}" draggable="false"></a>
	@endforeach
	<a href="#" target="_blank" rel="nofollow" title="专业网站建设" draggable="false">
	<img style="width: 100%" src="/HomeStyle/images//201610241224221511.jpg" alt="专业网站建设" draggable="false"></a>    
 </div>
 <div class="widget widget_sentence">    
	<a href="#" target="_blank" rel="nofollow" title="BlogHello" draggable="false">
	<img style="width: 100%" src="/HomeStyle/images/logo4.png" alt="BlogHello" draggable="false"></a>    
 </div>
<div class="widget widget_sentence">
  <h3>友情链接</h3>
  <div class="widget-sentence-link" style="height: 140px;">
  	@foreach($link as $k => $v)
	<a href="{{$v->url}}" title="{{$v->lname}}" target="_blank" draggable="false">{{$v->lname}}</a>&nbsp;&nbsp;&nbsp;
	@endforeach
  </div>
</div>
</aside>
</section>
@endsection