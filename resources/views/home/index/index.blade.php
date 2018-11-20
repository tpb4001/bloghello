@extends('home.layout.index')

@section('content')

	<section class="container">
<div class="content-wrap">
<div class="content">
	<!-- 轮播图 开始 -->
	<div id="focusslide" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			
			<li data-target="#focusslide" data-slide-to="0" class="active"></li>
			@for($i=1; $i <= $lbt; $i++)
			<li data-target="#focusslide" data-slide-to="{{ $i }}"	></li>
			@endfor
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<a href="/message" target="_blank" title="" draggable="false">
				<img src="/HomeStyle/images/liuyanban.jpg" alt="给我们留言" class="img-responsive" draggable="false"></a>
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
	<!-- 轮播图 结束 -->
	<!-- 推荐位  开始 -->
  	<article class="excerpt-minic excerpt-minic-index">
		<h2><span class="red">【推荐】</span><a target="_blank" href="/article/{{ $recarticle->art->id }}"  draggable="false">{{ $recarticle->art->title }}</a>
		</h2>
		<div style="height: 120px;overflow: hidden;">
			<a href="/article/{{ $recarticle->art->id }}">{!! $recarticle->article !!}</a>	
		</div>
	</article>
	<!-- 推荐位  结束 -->
  <div class="title">
	<h3>最新发布</h3>
  </div>
  <!-- 文章内容 开始 -->
  <div id="contentloading">
  @foreach ($article as $k=>$v)
  <div class=".box">
  	<article class="excerpt excerpt-1" style="">
  		<a class="focus" href="/article/{{ $v->id }}" target="_blank" draggable="false">
  			<img class="thumb" data-original="{{ $v->articleinfo->image }}" src="{{ $v->articleinfo->image }}" style="display: inline;" draggable="false">
  		</a>
		<header><a class="cat" href="/list/{{ $v->cates->id }}" draggable="false">{{ $v->cates->cname }}<i></i></a>
			<h2><a href="/article/{{ $v->id }}" title="{{ $v->title }}" target="_blank" draggable="false">{{ $v->title }}</a>
			</h2>
		</header>
		<p class="meta">
			<time class="time"><i class="glyphicon glyphicon-time"></i> {{ $v->created_at }}</time>
			<span class="views"><i class="glyphicon glyphicon-eye-open"></i> {{ $v->articleinfo->path }}</span>
		</p>
		<div style="height: 120px;overflow: hidden;">
			{!! $v->articleinfo->article !!}	
		</div>
	</article>
   </div> 
  @endforeach
  </div>
  <!-- 文章内容 结束 -->
</div>
	<nav class="pagination" style="display: none;">
		<ul>
		  <li class="prev-page"></li>
		  <li class="active"><span>1</span></li>
		  <li><a href="?page=2">2</a></li>
		  <li class="next-page"><a href="?page=2">下一页</a></li>
		  <li><span>共 2 页</span></li>
		</ul>
	</nav>
</div>

<aside class="sidebar">
<div class="fixed">
	<!-- 标签云 开始 -->
	<div class="widget widget-tabs">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" draggable="false">公告</a></li>
			<li role="presentation"><a href="#tagscloud" aria-controls="tagscloud" role="tab" data-toggle="tab" draggable="false">标签云</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane contact active" id="notice" >
				<h4 style="text-align: center;">{{ $ljg->title }}</h4>
				<h5>{!! $ljg->content !!}</h5>
			</div>
				<div role="tabpanel" class="tab-pane contact" id="tagscloud" style="width: 358px;margin-left: 0px;height: 154px;">
					@foreach ($tags as $k=>$v)
						<a href="http://{{ $v->url }}" target="_blank" class="{{ $v->tagsclass }}">{{ $v->tname }}</a>
					@endforeach
				</div>
				<script src='/HomeStyle/js/zzsc.js' type="text/javascript"></script>
		</div>
		<!-- 标签云 结束 -->
	</div>
  <div class="widget widget_search">
	<form class="navbar-form" action="/" method="get">
	  <div class="input-group">
	  	<select name="type" style="float: left;">
			<option value="article">文章</option>
			<option value="topic">话题</option>
	  	</select>
		<input type="text" name="title" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off" style="margin-top: 10px;">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit" style="margin-top: 32px;">搜索</button>
		</span> </div>
	</form>
  </div>
</div>
<!-- 话题 开始 -->
<div class="widget widget_hot">
	  <h3>话题讨论</h3>
	  <ul> 
	  	    @foreach ($topic as $k=>$v)       
			<li><a title="{{ $v->title }}" href="/topic/{{ $v->id }}" draggable="false"><span class="thumbnail">
				<img class="thumb" data-original="{{ $v->image }}" src="{{ $v->image }}" alt="{{ $v->title }}" style="display: block;" draggable="false" >
			</span><span class="text">{{ $v->title }}</span><span class="muted"><i class="glyphicon glyphicon-time"></i>
				{{ $v->created_at }}
			</span></a></li>
			@endforeach

	  </ul>
 </div>
 <!-- 话题 结束 -->
 <!-- 推荐博主 开始 -->
 <div class="widget widget_hot">
	  <h3>推荐博主</h3>
	  <ul> 
	  	    @foreach ($Blogger as $k=>$v)       
			<li><a title="{{ $v->uname }}" href="/grbk/{{ $v->id }}" draggable="false"><span class="thumbnail">
				<img class="thumb" data-original="" src="{{ $v->userinfo->avatar }}" alt="{{ $v->title }}" style="display: block;" draggable="false">
			</span><span class="text">{{ $v->uname }}</span><span class="muted">
				{{ $v->userinfo->introduce }}
			</span></a></li>
			@endforeach

	  </ul>
 </div>
  <!-- 推荐博主 结束 -->
 <div class="widget widget_sentence">
 	<h3>广告</h3>
 	 @foreach ($advert as $k=>$v)   
	<a href="{{ $v->url }}" target="_blank" rel="nofollow" title="{{ $v->aname }}" draggable="false">
	<img style="width: 100%; margin-bottom:20px;" src="{{ $v->image }}" alt="{{ $v->aname }}" draggable="false"></a>
	@endforeach
	   
 </div>

<div class="widget widget_sentence">
  <h3><b>友情链接</b></h3>
  <div class="widget-sentence-link" style="height: 50px;">
  	@foreach($link as $k => $v)
	<a href="{{$v->url}}" title="{{$v->lname}}" target="_blank" draggable="false">{{$v->lname}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
	@endforeach
  </div>
</div>
</aside>
</section>
@endsection