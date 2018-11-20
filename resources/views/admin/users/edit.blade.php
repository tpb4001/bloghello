@extends('admin.layout.index')


@section('content')

	<div class="mws-panel grid_8">
      	<div class="mws-panel-header" style="padding-bottom: 30px;">
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
                         <div class="mws-form-row" style="width: 200px;height: 200px;">
                              <span class="thumbnail"><img src="{{ $data->userinfo->avatar or '/Background/example/cyan_hawk.jpg'}}" style="width:200px;height: 200px;" alt=""></span>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头像</font></font></label>
                              <div class="mws-form-item">
                                   <input type="file" style="width: 200px;" name="avatar" class="medium">
                              </div>
                         </div> 
                          <div class="mws-form-row">
                              <label class="mws-form-label">身份</font></label>
                              <div class="mws-form-item clearfix">
                                   <ul class="mws-form-list inline">
                                        <li><input type="radio" name="Identity" value="1" @if(($data->Identity) == 1) checked @endif>管理员</li>
                                        <li><input type="radio" name="Identity" value="2" @if(($data->Identity) == 2) checked @endif>博主</li>
                                        <li><input type="radio" name="Identity" value="3" @if(($data->Identity) == 3) checked @endif>普通用户</li>
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