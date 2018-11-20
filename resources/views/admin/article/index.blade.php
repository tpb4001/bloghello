@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文章列表</font></font></span>
                    </div>
                     <form action="/admin/article" method="get">
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
                    <th>标题</th>
                    <th>类别</th>
                    <th>作者</th>
                    <th>来源</th>
                    <th>文章状态</th>
                    <th>文章图片</th>
                    <th>发布者</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($article as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td width="120px">{{ $v->title }}</td>
                    <td width="60px">{{ $v->cates->cname }}</td>
                    <td width="70px">{{ $v->auth }}</td>
                    <td width="50px">{{ $v->copyform }}</td>
                    <td>{{ $v->status ? '展示' : '下架' }}</td>
                    <td>{{ $v->articleinfo->image or '无图片' }}</td>
                    <td>{{ $v->abc->uname }}</td>
                    <td>{{ $v->created_at }}</td>

                    <td><a href="/admin/article/{{ $v->id }}" class="btn btn-info">详情</a>
                        <a href="/admin/pinglun/{{ $v->id }}" class="btn btn-info">查看评论</a>
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
         <div class="dataTables_info" id="DataTables_Table_1_info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分页显示</font></font></div>
                        <div id="page_page">
                            {!! $article->appends($request)->render() !!}
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