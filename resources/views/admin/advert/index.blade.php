@extends('admin.layout.index')


@section('content')
          <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告列表</font></font></span>
                    </div>
                     <form action="/admin/advert" method="get">
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
									<th>广告名称</th>
									<th>广告地址</th>
									<th>广告logo</th>
									<th>添加日期</th>
									<th>操作</th>

                                </tr>
                            </thead>
                           <tbody role="alert" aria-live="polite" aria-relevant="all">
								@foreach($advert as $k => $v)
                           		<tr class="odd">
                           			
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->aname}}</td>
                                    <td>{{$v->url}}</td>
                                    <td><img src="{{$v->image}}" alt="" width="80px"></td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
                                        <a href="/admin/advert/{{$v->id}}/edit" class="btn btn-warning">修改</a>
										<form action="/admin/advert/{{ $v->id }}" method="post" style="display: inline-block">
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
                            {!! $advert->appends($request)->render() !!}
                        </div>
                    </div>
                    </div>
                </div>
@endsection
