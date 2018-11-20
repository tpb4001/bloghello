@extends('admin.layout.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header" style="padding-bottom: 30px;">
            <span><i class="icon-table"></i>留言浏览</span>
        </div>
         <form action="/admin/tags" method="get">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
          <div class="dataTables_filter" id="DataTables_Table_1_filter">
            <label>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">关键字</font></font>
              <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1"></label>
            <input type="submit" value="搜索" class="btn btn-info">
          </div>
        </form>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit; font-size:20px;">ID</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">用户名</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">用户留言</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">回复内容</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">留言时间</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">操作</font></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($message as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->user_name->uname }}</td>
                    <td>{{ $v->umes }}</td>
                    <td>{{ $v->huifu }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                        <a href="/admin/message/{{$v->id}}" class="btn btn-info">回复</a>
                    <form action="/admin/message/{{ $v->id }}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input  type="submit" value="删除留言" class="btn btn-danger" onclick="return confirm('请确认删除');">
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        <div class="dataTables_info" id="DataTables_Table_1_info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分页显示</font></font></div>
                <div id="page_page">
            {!! $message->appends($request)->render() !!}
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