@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>留言浏览</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit; font-size:20px;">ID</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">用户名</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">回复内容</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">留言时间</font></th>
                        <th><font style="vertical-align: inherit; font-size:20px;">操作</font></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($message_hf as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->user_name->uname }}</td>
                    <td>{{ $v->huifu }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                       
                    <form action="/admin/message/{{ $v->id }}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input  type="submit" value="删除回复" class="btn btn-danger" onclick="return confirm('请确认删除');">
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection