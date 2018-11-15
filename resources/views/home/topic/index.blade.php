@extends('home.layout.index')


@section('content')
	<table class="table table-hover">
  <caption>全部话题</caption>
  <thead>
    <tr>
      <th>标题</th>
      <th>作者</th>
      <th>发布时间</th>
      <th>评论/浏览</th>
    </tr>
  </thead>
  <tbody>
   
    @foreach ($topic as $k=>$v)
    <?php
        // 评论条数
        $comment = \App\Models\Comment::where('tid',$v['id'])->get();
        $sum = count($comment);
    ?>
    <tr>
      <td><a href="/">[bloghello]</a> <a href="/topic/{{ $v->id }}">{{ $v->title }}</a></td>
      <td>{{ $v->abc->uname }}</td>
      <td>{{ $v->created_at}}</td>
      <td>{{ $sum }}/{{ $v->path }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection