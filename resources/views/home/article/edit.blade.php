@extends('home.layout.detalis')

@section('Dh')
	<li>
		<a data-cont="Blog Hello" title="基本信息" href="/Bdetalis">基本信息</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="文章发布" href="/detalis/article/create">文章发布</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="浏览文章" href="/detalis/article">浏览文章</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="个人相册" href="#">个人相册</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="关注" href="#">关注</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="修改密码" href="/Bdetalis/{{ session('uname') }}/edit">修改密码</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="返回首页" href="/">返回首页</a>
	</li> 
@endsection()

@section('content')
<h2 style="margin-bottom: 30px;margin-top: 10px;">文章发布</h2>
<form action="/detalis/article/{{ $data->id }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
  	<div class="form-group">
  	  	<label for="exampleInputEmail1">文章标题</label>
  	  	<input type="text" class="form-control" name="title" value="{{ $data->title }}" placeholder="文章标题">
  	</div>
  	<div class="form-group">
  		<label for="exampleInputEmail1">类别</label>
  		<select class="form-control" name="cid">
  			@foreach($cates as $k=>$v)
		  		<option @if($data->cid == $v->id ) selected @endif value="{{ $v->id }}">{{ $v->cname }}</option>
		  	@endforeach
		</select>
	</div>
  	<div class="form-group">
    	<label for="exampleInputEmail1">作者</label>
    	<input type="text" class="form-control" name="auth" value="{{ $data->auth }}" placeholder="作者">
 	 </div>
 	 <div class="form-group">
    	<label for="exampleInputEmail1">文章来源</label>
    	<input type="text" class="form-control" name="copyform" value="{{ $data->copyform }}" placeholder="文章来源">
 	 </div>
 	 <div class="form-group">
    	<label for="exampleInputEmail1">图片</label>
    	<input type="file" class="form-file" name="image">
 	 </div>
 	 <div class="form-group" style="height: 420px;">
    	<label for="exampleInputEmail1">文章内容</label>
    	<!-- 加载编辑器的容器 -->
	    <script id="container" name="article" type="text/plain">
	    	{!! $data->articleinfo->article !!}
	    </script>
        <!-- 加载编辑器的容器 结束-->
 	 </div>
  <button type="submit" class="btn btn-info" style="margin-bottom: 30px;">保存</button>
</form>
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
 <!-- 实例化编辑器 -->

<script type="text/javascript">
    var ue = UE.getEditor('container',{
     initialFrameHeight:300,//设置编辑器高度
    });
</script>
@endsection