@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">话题列表</font></font></span>
            </div>
             <form action="/admin/topic" method="get">
                <div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
              <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">关键字</font></font>
                  <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1"></label>
                <input type="submit" value="搜索" class="btn btn-info">
              </div>
            </form>
<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
    <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>发起人</th>
            <th>话题内容</th>
            <th>话题图片</th>
            <th>浏览次数</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach ($topic as $k=>$v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->title }}</td>
            <td>{{ $v->abc->uname }}</td>
            <td>{!! $v->content !!}</td>
            <td>{{ $v->topic->image or '无图片' }}</td>
            <td>{{ $v->path }}</td>
            <td>{{ $v->created_at }}</td>
            <td><a href="/admin/topic/{{ $v->id }}" class="btn btn-info">详情</a>
				<a href="/admin/topic/{{$v->id}}/edit" class="btn btn-warning">修改</a>
			<form action="/admin/topic/{{ $v->id }}" method="post" style="display: inline-block">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('请确认删除');">
			</form>
            </td>
        </tr>
        @endforeach
    </tbody>    
</table>
<div class="dataTables_info" id="DataTables_Table_1_info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分页显示</font></font></div>
                <div id="page_page">
                    {!! $topic->appends($request)->render() !!}
                </div>
            </div>
            </div>
        </div>
@endsection
