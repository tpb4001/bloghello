@extends('admin.layout.index')


@section('content')

	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{ $title or '' }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/users/{{$data->id}}" method="post">
                              {{ csrf_field() }}
                              {{ method_field("PUT") }}
                              <div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户名</font></label>
                    				<div class="mws-form-item">
                    					<input type="text" name="uname" value="{{$data->uname}}" class="small">
                    				</div>
                    			</div>
                                  
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">手机号</font></label>
                                        <div class="mws-form-item">
                                             <input type="text" name="phone" value="{{$data->userinfo->phone}}" class="small">
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">邮箱</font></label>
                                        <div class="mws-form-item">
                                             <input type="text" name="email" value="{{$data->userinfo->email}}" class="small">
                                        </div>
                                   </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">身份</font></label>
                                        <div class="mws-form-item clearfix">
                                             <ul class="mws-form-list inline">
                                                  <li><input type="radio" name="ldentity" value="1">管理员</li>
                                                  <li><input type="radio" name="ldentity" value="2">审核管理员</li>
                                                  <li><input type="radio" name="ldentity" value="3">博主</li>
                                                  <li><input type="radio" name="ldentity" value="4" checked>普通用户</li>
                                             </ul>
                                        </div>
                                   </div>
                    		<div class="mws-button-row">
                    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="修改" class="btn btn-success"></font></font>
                    			<input type="reset" value="重置" class="btn btn-info">
                    		</div>
                    	</form>
                    </div>    	
                </div>

@endsection