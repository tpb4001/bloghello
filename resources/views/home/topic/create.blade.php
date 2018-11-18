@extends('home.layout.index')


@section('content')
<h2 style="margin-bottom: 30px;margin-top: 10px;">话题发布</h2>
<form action="/topic" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="uname" value="{{ session('uname') }}">
  	<div class="form-group">
  	  	<label for="exampleInputEmail1">话题标题</label>
  	  	<input type="text" class="form-control" name="title" placeholder="话题标题">
  	</div> 
    <div class="form-group">
        <label for="exampleInputEmail1">话题图片</label>
        <input type="file" name="image">
    </div>
 	 <div class="form-group" style="height: 420px;">
    	<label for="exampleInputEmail1">话题内容</label>
    	<!-- 加载编辑器的容器 -->
	    <script id="container" name="content" type="text/plain">
	    </script>
        <!-- 加载编辑器的容器 结束-->
 	 </div>
  <button type="submit" class="btn btn-info" style="margin-bottom: 30px;">发布</button>
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