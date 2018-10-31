@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>公告浏览</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>公告标题</th>
                    <th>公告时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notice as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->uid }}</td>
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
    </div>
</div>
@endsection