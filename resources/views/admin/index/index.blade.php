@extends('admin.layout.index')

@section('content')
<!-- 系统基本信息 开始 -->
<div class="mws-panel grid_4" >
	<div class="mws-panel-header" style="padding-bottom: 30px;">
    	<span>系统基本信息</span>
    </div>
    <div class="mws-panel-body">
        <fieldset class="layui-elem-field">
		    <div class="layui-field-box">
		        <table class="table">
		            <colgroup>
		                <col width="150">
		                <col width="200">
		                <col>
		            </colgroup>
		            <thead>
		                <tr>
		                <th>用户：</th>
		                <td>{{ $account->uname}}</td>
		                </tr> 
		            </thead>
		            <tbody>
		                <tr>
		                <th>域名:</th>
		                <td>{{ $_SERVER["HTTP_HOST"] }}</td>
		                </tr>
		            </tbody>
		            <tbody>
		                <tr>
		                <th>服务器IP地址:</th>
		                <td>{{ GetHostByName($_SERVER['SERVER_NAME']) }}</td>
		                </tr>
		            </tbody>
		            <tbody>
		                <tr>
		                <th>您的IP地址:</th>
		                <td>{{ $_SERVER['REMOTE_ADDR'] }}</td>
		                </tr>
		            </tbody>
		            <tbody>
		                <tr>
		                <th>服务器解译引擎:</th>
		                <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
		                </tr>
		            </tbody>
		            <tbody>
		                <tr>
		                <th>PHP版本:</th>
		                <td>{{ PHP_VERSION }}</td>
		                </tr>
		            </tbody>
		            <tbody>
		                <tr>
		                <th>系统类型：</th>
		                <td>{{ php_uname('s')  }}</td>
		                </tr>
		            </tbody>
		            <tbody>
		                <tr>
		                <th>系统版本号：</th>
		                <td>{{ php_uname('r')  }}</td>
		                </tr>
		            </tbody>
		        </table>
		    </div>
		</fieldset>
    </div>
</div>
<!-- 系统基本信息 开始 -->
<!-- 简介文章 开始 -->
<div class="mws-panel grid_4 mws-collapsible">
	<div class="mws-panel-header" style="padding-bottom: 30px;">
    	<span>最新文章</span>
    <div class="mws-collapse-button mws-inset"><span></span></div></div>
    <div class="mws-panel-inner-wrap"><div class="mws-panel-body">
       	<table class="table text-center">
			<tr>
				<td style="width: 510px;">标题</td>
				<td>作者</td>
				<td>发布时间</td>
			</tr>
			@foreach($article as $k=>$v)
				<tr>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->title }}</td>
					<td>{{ $v->auth }}</td>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->created_at }}</td>
				</tr>
			@endforeach          	
		</table> 
    </div></div>
</div>
<!-- 简介文章 结束 -->
<!-- 公告查看 开始 -->
<div class="mws-panel grid_4 mws-collapsible">
	<div class="mws-panel-header" style="padding-bottom: 30px;">
    	<span>最新公告</span>
    <div class="mws-collapse-button mws-inset"><span></span></div></div>
    <div class="mws-panel-inner-wrap"><div class="mws-panel-body">
       	<table class="table text-center">
			<tr>
				<td style="width: 400px;">标题</td>
				<td>发布者</td>
				<td>发布时间</td>
			</tr>
			@foreach($notice as $k=>$v)
				<tr>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->title }}</td>
					<td>{{ $v->user->uname }}</td>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->created_at }}</td>
				</tr>
			@endforeach   
		</table> 
    </div></div>
</div>
<!-- 公告查看 结束 -->
<!-- 最新话题 开始 -->
<div class="mws-panel grid_4 mws-collapsible">
	<div class="mws-panel-header" style="padding-bottom: 30px;">
    	<span>最新话题</span>
    <div class="mws-collapse-button mws-inset"><span></span></div></div>
    <div class="mws-panel-inner-wrap"><div class="mws-panel-body">
       	<table class="table text-center">
			<tr>
				<td style="width: 510px;">标题</td>
				<td>版主</td>
				<td>发布时间</td>
			</tr>
			@foreach($topic as $k=>$v)
				<tr>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->title }}</td>
					<td>{{ $v->abc->uname }}</td>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->created_at }}</td>
				</tr>
			@endforeach       	
		</table> 
    </div></div>
</div>
<!-- 最新话题 结束 -->
<!-- 留言 开始 -->
<div class="mws-panel grid_4 mws-collapsible">
	<div class="mws-panel-header" style="padding-bottom: 30px;">
    	<span>留言</span>
    <div class="mws-collapse-button mws-inset"><span></span></div></div>
    <div class="mws-panel-inner-wrap"><div class="mws-panel-body">
       	<table class="table text-center">
			<tr>
				<td style="width: 510px;">内容</td>
				<td>用户</td>
				<td>留言时间</td>
			</tr>
			@foreach($message as $k=>$v)
				<tr>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->umes }}</td>
					<td>{{ $v->user_name->uname }}</td>
					<td style="overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{ $v->created_at }}</td>
				</tr>
			@endforeach         	
		</table> 
    </div></div>
</div>
<!-- 留言 结束 -->
@endsection