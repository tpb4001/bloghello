@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/index/{{ $data->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		{{ method_field('PUT') }}
        		<input type="hidden" name="show" value="show">
        		<div class="mws-form-inline">
        			<div class="mws-form-row" style="width: 200px;height: 200px; display: block; margin-left: auto; margin-right: auto;">
                    	<span class="thumbnail"><img src="{{ $data->userinfo->avatar }}" style="width:200px;height: 200px;" alt=""></span>
                    </div>
                    <div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头像</font></font></label>
        				<div class="mws-form-item">
        					<input type="file" style="width: 200px;" name="avatar" class="medium">
        				</div>
        			</div>    
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label>
        				<div class="mws-form-item">
        					<input type="text" name="uname" readonly value="{{ $data->uname }}" class="medium">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">手机号</font></font></label>
        				<div class="mws-form-item">
        					<input type="text" name="phone" value="{{ $data->userinfo->phone }}" class="medium">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">邮箱</font></font></label>
        				<div class="mws-form-item">
        					<input type="text" name="email" value="{{ $data->userinfo->email }}" class="medium">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font></label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><input name="sex" value="1" @if(($data->userinfo->sex) == 1) checked @endif type="radio"> <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">男</font></font></label></li>
        						<li><input name="sex" value="2" @if(($data->userinfo->sex) == 2) checked @endif type="radio"> <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">女</font></font></label></li>
        						<li><input name="sex" value="3" @if(($data->userinfo->sex) == 3) checked @endif type="radio"> <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">保密</font></font></label></li>
        					</ul>
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">简介</font></font></label>
        				<div class="mws-form-item">
        					<textarea rows="" name="introduce" cols="" class="large">{{ $data->userinfo->introduce }}</textarea>
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">身份</font></font></label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><input name="Identity" @if(($data->Identity) == 1) checked @endif value="1" type="radio"> <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员</font></font></label></li>
        						<li><input name="Identity" @if(($data->Identity) == 2) checked @endif value="2" type="radio"> <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">博主</font></font></label></li>
        						<li><input name="Identity" @if(($data->Identity) == 3) checked @endif value="3" type="radio"> <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户</font></font></label></li>
        					</ul>
        				</div>
        			</div>
        		</div>
        		<div class="mws-button-row">
        			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        				<input type="submit" value="确定" class="btn btn-danger"></font></font>
        		</div>
        	</form>
        </div>    	
    </div>
@endsection