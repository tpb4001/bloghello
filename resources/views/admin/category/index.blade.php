@extends('admin.layout.index')

@section('content')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="index.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">主页</font></font></a><i class="fa fa-angle-right"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></li>
	</ol>
	<!-- 表单 开始 -->
	<div class="agile-tables">
		<table class="table">
			<tr>
				<td>ID</td>
				<td>列表</td>
			</tr>
			<tr>
				<td>ID</td>
				<td>列表</td>
			</tr>
		</table>
	</div>
	<!-- 表单 结束 -->
@endsection