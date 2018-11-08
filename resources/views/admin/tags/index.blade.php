@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
		<div class="mws-panel-header">
	    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
	    </div>
	    <form action="/admin/tags" method="get">
	    <div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
	  	<div id="DataTables_Table_1_length" class="dataTables_length">
	    <label>
	      <font style="vertical-align: inherit;">
	        <font style="vertical-align: inherit;">显示</font></font>
	      <select size="1" name="showCount" aria-controls="DataTables_Table_1">
	        <option value="10" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 10) selected @endif>
	          <font style="vertical-align: inherit;">
	            <font style="vertical-align: inherit;">10</font></font>
	        </option>
	        <option value="25" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 25) selected @endif>
	          <font style="vertical-align: inherit;">
	            <font style="vertical-align: inherit;">25</font></font>
	        </option>
	        <option value="50" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 50) selected @endif>
	          <font style="vertical-align: inherit;">
	            <font style="vertical-align: inherit;">50</font></font>
	        </option>
	        <option value="100" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 100) selected @endif>
	          <font style="vertical-align: inherit;">
	            <font style="vertical-align: inherit;">100</font></font>
	        </option>
	      </select>
	      <font style="vertical-align: inherit;">
	        <font style="vertical-align: inherit;">条</font></font>
	    </label>
	  </div>

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
           		<th>标签名字</th>
           		<th>标签样式</th>
           		<th>URL地址</th>
           		<th>操作</th>
           </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	@foreach($tags as $l=>$v)
        	<tr>
        		<td>{{ $v->id }}</td>
        		<td>{{ $v->tname }}</td>
        		<td><a href="http://{{ $v->url }}"><button type="button" class="{{ $v->tagsclass }}">{{ $v->tname }}</button></a></td>
        		<td>{{ $v->url }}</td>
        		<td>
        			<a href="/admin/tags/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
        			<form action="/admin/tags/{{ $v->id }}" method="post" style="display: inline-block;">
                		{{ csrf_field() }}
                		{{ method_field('DELETE') }}
                		<input type="submit" onclick="return confirm('请确认删除');" value="删除" class="btn btn-danger">
                	</form>
        		</td>
        	</tr>
        	@endforeach
        </tbody>
    </table>
			<div id="page_page">
				{!! $tags->appends($request)->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection