@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>用户举报</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>举报人</th>
                    <th>举报文章</th>
                    <th>文章发布者</th>
                    <th>举报内容</th>
                    <th>举报时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->getUser->uname or '已处理' }}</td>
                    <td>{{ $v->getT->title or '已处理' }}</td>
                    <td>{{ $v->getB->uname or '已处理'}}</td>
                    <td>{{ $v->content }}</td>
                    <td>{{ $v->created_at }}</td>

                    <td>
                        <a href="/admin/report/{{ $v->id }}" class="btn btn-info">文章内容</a>
						<form action="/admin/article/{{ $v->getT->id }}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" value="删除文章" class="btn btn-danger" onclick="return confirm('请确认删除');">
                        </form>
					<form action="/admin/report/{{ $v->id }}" method="post" style="display: inline-block">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" value="删除举报" class="btn btn-danger" onclick="return confirm('请确认删除');">
					</form>
                    </td>
                </tr>
                @endforeach
            </tbody>    
        </table>
    </div>
</div>
@endsection