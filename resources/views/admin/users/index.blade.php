@extends('admin.layout.index')


@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 带有编号分页的数据表</font></font></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_1_length" class="dataTables_length"><label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示 </font></font><select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"><option value="10" selected="selected"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></option><option value="25"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25</font></font></option><option value="50"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></option><option value="100"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></option></select><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 页</font></font></label></div><div class="dataTables_filter" id="DataTables_Table_1_filter"><label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">搜索： </font></font><input type="text" aria-controls="DataTables_Table_1"></label></div><table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
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
								@foreach($user as $k => $v)
                           		<tr class="odd">
                           			
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->uname}}</td>
                                    <td>{{$v->userinfo->phone}}</td>
                                    <td>{{$v->userinfo->email}}</td>
                                    <td>{{$v->ldentity}}</td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
										<a href="/admin/users/{{$v->id}}/edit" class="btn btn-warning">修改</a>
										<a href="" class="btn btn-info">详情</a>
										<form action="/admin/users/{{$v->id}}" method="post" style="display: inline-block">
											{{csrf_field()}}
											{{method_field('DELETE')}}
											<input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('请确认删除');">
											
										</form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>  
                        </table><div class="dataTables_info" id="DataTables_Table_1_info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分页显示</font></font></div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">第一</font></font></a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">前一个</font></font></a><span><a tabindex="0" class="paginate_active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1 </font></font></a><a tabindex="0" class="paginate_button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2 </font></font></a><a tabindex="0" class="paginate_button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3 </font></font></a><a tabindex="0" class="paginate_button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4 </font></font></a><a tabindex="0" class="paginate_button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">下一个</font></font></a><a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">最后</font></font></a></div></div>
                    </div>
                </div>
@endsection
