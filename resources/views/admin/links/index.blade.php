@extends('admin.layout.index')


@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header" style="padding-bottom: 30px;">
                    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">友情链接列表</font></font></span>
                    </div>
                     <form action="/admin/link" method="get">
                        <div class="mws-panel-body no-padding">
                            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                       

                      <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">关键字</font></font>
                          <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1"></label>
                        <input type="submit" value="搜索" class="btn btn-info">
                      </div>
                    </form>

                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr>
									<th>ID</th>
									<th>链接名称</th>
									<th>链接地址</th>
									<th>链接logo</th>
									<th>状态</th>
									<th>注册日期</th>
									<th>操作</th>

                                </tr>
                            </thead>
                           <tbody role="alert" aria-live="polite" aria-relevant="all">
								@foreach($link as $k => $v)
                           		<tr class="odd">
                           			
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->lname}}</td>
                                    <td>{{$v->url}}</td>
                                    <td><img src="{{$v->image}}" alt="" width="80px"></td>
                                    <td>{{$v->status}}</td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
										<a href="/admin/link/{{$v->id}}/edit" class="btn btn-warning">修改</a>
										
										<form action="/admin/link/{{ $v->id }}" method="post" style="display: inline-block">
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
                            {!! $link->appends($request)->render() !!}
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
