@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header" style="padding-bottom: 30px;">
        	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{ $title }}</font></font></span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font>
                        </th>
                        <th>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类名称</font></font>
                        </th>
                        <th>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">属性分类ID</font></font>
                        </th>
                        <th>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类路径</font></font>
                        </th>
                        <th>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类状态</font></font>
                        </th>
                        <th>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cates as $k=>$v)
                    <tr>
                        <td>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->id }}</font></font>
                        </td>
                        <td>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->cname }}</font></font>
                        </td>
                        <td>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->pid }}</font></font>
                        </td>
                        <td>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->path }}</font></font>
                        </td>
                        <td>
                        	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->status == 1 ? '激活' : '未激活' }}</font></font>
                        </td>
                        <td>
                        	<a href="/admin/cates/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        	<form action="/admin/cates/{{ $v->id }}" method="post" style="display: inline-block;">
                        		{{ csrf_field() }}
                        		{{ method_field('DELETE') }}
                        		<input type="submit" onclick="return confirm('请确认删除');" value="删除" class="btn btn-danger">
                        	</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection