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
	<table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>标题</th>
          <th>类别</th>
          <th>作者</th>
          <th>来源</th>
          <th>图片</th>
          <th>状态</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        	@foreach($article as $k=>$v)
          <tr>
          	<td>{{ $v->id }}</td>
          	<td>{{ $v->title }}</td>
          	<td>{{ $v->cates->cname }}</td>
          	<td>{{ $v->auth }}</td>
          	<td>{{ $v->copyform }}</td>
          	<td><img style="width: 60px;" src="{{ $v->articleinfo->image or '' }}"></td>
          	<td>{{ $v->status == 1 ? '审核通过' : '审核中' }}</td>
          	<td>
          		<a href="/article/{{ $v->id }}" class="btn btn-info">详情</a>
          		<a href="/detalis/article/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
          		<form action="/detalis/article/{{ $v->id }}" method="post" style="display: inline-block">
          			{{ csrf_field() }}
          			{{ method_field('DELETE') }}
          			<input type="submit" class="btn btn-danger" onclick="return confirm('请确认删除');" value="删除">
          		</form>
          	</td>
          </tr>
          @endforeach
      </tbody>
    </table>
@endsection