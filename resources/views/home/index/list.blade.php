@extends('home.layout.index')

@section('content')	
<div class="content" style="margin-right: 0px;">
  <div class="title">
	<h3 style="line-height: 1.3">{{ $cates->cname }}</h3>
  </div>
  @foreach($article as $k=>$v)
  <article class="excerpt excerpt-1">
  	<a class="focus" href="/article/{{ $v->id }}" target="_blank" draggable="false"><img class="thumb" data-original="/HomeStyle/images/logo1.png" src="{{ $v->articleinfo->images }}" style="display: inline;" draggable="false"></a>
	<header>
	  <h2><a href="/article/{{ $v->id }}"  target="_blank" draggable="false">{{ $v->title }}</a></h2>
	</header>
	<p class="meta">
	  <time class="time"><i class="glyphicon glyphicon-time"></i> {{ $v->created_at }}</time>
	  <span class="views"><i class="glyphicon glyphicon-eye-open"></i> {{ $v->articleinfo->path }}</span>
	</p>
	<div style="height: 135px;overflow: hidden;">
		<a href="/article/{{ $v->id }}">
		{!! $v->articleinfo->article !!}
		</a>	
	</div>
  </article>
  @endforeach
</div>
	<!-- 分页 -->
	<nav class="pagination" style="display: none;">
		<ul>
		  <li class="prev-page"></li>
		  <li class="active"><span>1</span></li>
		  <li><a href="?page=2">2</a></li>
		  <li class="next-page"><a href="?page=2">下一页</a></li>
		  <li><span>共 2 页</span></li>
		</ul>
	</nav>
@endsection