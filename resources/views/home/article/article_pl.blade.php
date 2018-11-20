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
	<table class="table table-hover">
      <thead>
        <tr>
          <th>时间</th>
          <th>文章标题</th>
          <th>评论内容</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($article_pl as $k=>$v)
        <tr>
          <td>{{ $v->created_at }}</td>
          <td>{{ $v->art->title }}</td>
          <td>{{ $v->pinglun }}</td>
          <td><a href="/article/{{ $v->aid }}" class="btn btn-info">查看文章</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection