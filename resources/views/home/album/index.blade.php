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
		<a data-cont="Blog Hello" title="个人相册" href="/myalbum">个人相册</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="修改密码" href="/Bdetalis/{{ session('uname') }}/edit">修改密码</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="返回首页" href="/">返回首页</a>
	</li> 
@endsection()

@section('content')
<div class="layui-upload" style="margin-bottom: 10px;">   
	<a class="layui-btn" id="test1" href="/myalbum/create">上传图片</a>   
</div>
<div class="row">
	@foreach($album as $k=>$v)
	<div class="col-md-3">
		<span>{{ $v->content}}</span>
		<img src="{{ $v->image }}" style="margin-top: 4px; height: 200px;" class="img-thumbnail">
		<div class="text-right">
			<a href="javascript:;" href="#" onclick="open('/myalbum/{{ $v->id }}/edit',',','width=600,height=600,left=150,top=150,resizable=no,scrollbars=no,status=yes,toolbar=no,location=no,menubar=no,menu=yes')"><span class="glyphicon glyphicon-pencil"></span></label></a>
			<form action="/myalbum/{{ $v->id }}" method="post" style="display: inline-block">
      			{{ csrf_field() }}
      			{{ method_field('DELETE') }}
      			<div style="display: none;"><input type="submit" id="album_del" onclick="return confirm('请确认删除');" value='删除'></div>
      			<label for="album_del" class="glyphicon glyphicon-remove" style="cursor:pointer"></label>
      		</form>
		</div>
	</div>
	@endforeach
</div>
@endsection 