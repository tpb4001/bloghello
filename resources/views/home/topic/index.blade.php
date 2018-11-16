@extends('home.layout.index')


@section('content')
  
	<table class="table table-hover">
    
      <caption style="line-height: 50px;font-size: 22px;">
      <a href="/topic/create" style="float: right;font-size: 20px;" class="btn btn-info">话题发布</a>
       全部话题
      </caption>
  <thead>
    <tr>
      <th>标题</th>
      <th>作者</th>
      <th>发布时间</th>
      <th>评论</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($topic as $k=>$v)
    <tr onclick="location.href='/topic/{{ $v->id }}';" >
      <td style="width: 716px"><a href="/topic/{{ $v->id }}">{{ $v->title }}</a></td>
      <td>{{ $v->abc->uname }}</td>
      <td>{{ $v->created_at}}</td>
      <td>{{ count($v->getComment) }}</td>
    </tr>
   @endforeach
  </tbody>
</table>
@endsection