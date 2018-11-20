@extends('admin.layout.index')


@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header" style="padding-bottom: 30px;">
        	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" style="text-align: center;" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr>
						<th>ID</th>
						<th>用户名</th>
						<th>手机号码</th>
						<th>邮箱</th>
						<th>身份</th>
						<th>注册日期</th>
						<th>操作</th>
                    </tr>
                </thead>
               <tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach($OrdinaryUser as $k => $v)
               		<tr class="odd">	
                        <td>{{$v->id}}</td>
                        <td>{{$v->uname}}</td>
                        <td>{{$v->userinfo->phone}}</td>
                        <td>{{$v->userinfo->email}}</td>
                        <td>
                            @if($v->Identity == 1)
                            管理员
                            @elseif($v->Identity == 2)
                            博主
                            @else
                            普通用户
                            @endif
                        </td>
                        <td>{{$v->created_at}}</td>
                        <td>
							<a href="/admin/users/{{$v->id}}/edit" class="btn btn-warning">修改</a>
							<form action="/admin/users/{{$v->id}}" method="post" style="display: inline-block">
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
                {!! $OrdinaryUser->appends($request)->render() !!}
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
