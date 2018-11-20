@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header" style="padding-bottom: 30px;">
        <span>浏览文章</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>内容</th>
                    <th>图片</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Palbum as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->content }}</td>
                    <td><img style="height: 100px;" src="{{ $v->image }}"></td>
                    <td>
                        <a class="btn btn-danger" href="/admin/users/Palbum/Del/{{$v->id}}">删除</a>
                    </td>
                </tr> 
                @endforeach
            </tbody>    
        </table>
    </div>
</div>
@endsection