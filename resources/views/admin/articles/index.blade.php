@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>作者</th>
                    <th>浏览量</th>
                    <th>来源</th>
                    <th>文章状态</th>
                     <th>文章图片</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($article as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->biaoti }}</td>
                    <td>{{ $v->auth }}</td>
                    <td>{{ $v->copyform }}</td>
                    <td>{{ $v->articleinfo->path }}</td>
                    <td>{{ $v->status }}</td>
                    <td>{{ $v->articleinfo->image }}</td>
                    <td>{{ $v->created_at }}</td>

                    <td><a href="/admin/article/{{ $v->id }}" class="btn btn-info">详情</a>
						<a href="/admin/article/{{$v->id}}/edit" class="btn btn-warning">修改</a>
					<form action="/admin/article/{{ $v->id }}" method="post" style="display: inline-block">
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