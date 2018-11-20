@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>图片浏览</span>
    </div>
   <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        	<div id="DataTables_Table_0_length" class="dataTables_length">
        		<label>显示 
        			<select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
        			<option value="5" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 5) selected @endif>5</option>
          			<option value="10" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 10) selected @endif>10</option>
         			<option value="20" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 20) selected @endif>20</option>
          			<option value="30" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 30) selected @endif>30</option>
        			</select>
        		条</label>
        	</div>
        	<div class="dataTables_filter" id="DataTables_Table_0_filter">
        		<label class='uname'>
        		<span>关键字</span>
        		<input type="text" name='search' value="{{ $request['search'] or '' }}">
      			</label>
      		</div>
      		<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        </div>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名字</th>
                    <th>链接地址</th>
                    <th>图片</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($image as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->iname }}</td>
                    <td>{{ $v->iurl }}</td>
                    <td><img src="{{ $v->img }}" style="width:200px;height:70px;border-radius:0px;"></td>
                    <td>
                        
                        @if ($v->status == 2)
						    未激活
						@else
						    激活
						@endif
					</td>
                    <td>
						<a href="/admin/image/{{$v->id}}/edit" class="btn btn-warning">修改</a>
					<form action="/admin/image/{{ $v->id }}" method="post" style="display: inline-block">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('请确认删除');">
					</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="page_page">
            {!! $image->appends($request)->render() !!}
        </div>
        <script type="text/javascript">
            $(function(){
                $('#page_page ul').removeClass('.pagination');
                $("#page_page ul").attr("class", "#page_page");
            });
        </script>
    </div>
</div>
@endsection