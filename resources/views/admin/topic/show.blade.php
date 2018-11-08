@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>评论列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>评论人</th>
                    <th>评论内容</th>
                    <th>评论时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comment as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->abc->uname }}</td>
                    <td>{!! $v->content !!}</td>
                    <td>{{ $v->created_at }}</td>

                    <td><a href="/admin/topic" class="btn btn-info">返回</a>
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
    </div>
</div>
@endsection
