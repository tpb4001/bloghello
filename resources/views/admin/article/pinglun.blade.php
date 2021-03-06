@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header" style="padding-bottom: 30px;">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">评论列表</font></font></span>
                    </div>
                     

        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>评论人</th>
                    <th>评论内容</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($article_pl as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->user->uname }}</td>
                    <td>{{ $v->pinglun }}</td>
                    <td>{{ $v->created_at }}</td>

                    <td>
                        <a href="/admin/article" class="btn btn-info">返回</a>
                        <form action="/admin/pinglun/{{ $v->id }}" method="post" style="display: inline-block">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('请确认删除');">
                        </form>
                    </td>
                </tr>
               
                @endforeach
            </tbody>    
        </table>
         
                    </div>
                    </div>
                </div>

@endsection