@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header" style="padding-bottom: 30px;">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告列表</font></font></span>
                    </div>
                     <form action="/admin/notice" method="get">
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
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>公告标题</th>
                    <th>公告时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notice as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->title }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td><a href="/admin/notice/{{ $v->id }}" class="btn btn-info">查看详情</a>
						<a href="/admin/notice/{{$v->id}}/edit" class="btn btn-warning">修改</a>
					<form action="/admin/notice/{{ $v->id }}" method="post" style="display: inline-block">
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
        {!! $notice->appends($request)->render() !!}
    </div>
    <script type="text/javascript">
        $(function(){
            $('#page_page ul').removeClass('.pagination');
            $("#page_page ul").attr("class", "#page_page");
        });
    </script>
</div>
</div>
</div>
@endsection