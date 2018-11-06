@extends('admin.layout.index');


@section('content')
    <!-- 显示验证信息 开始 -->

             @if (count($errors) > 0)
                 <div class="mws-form-message error">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
           <!-- 显示验证信息 结束 -->
	<div class="mws-panel grid_8">
  	<div class="mws-panel-header">
      	<span>{{ $title or '' }}</span>
      </div>
      <div class="mws-panel-body no-padding">
      	<form class="mws-form" action="/admin/users" method="post">
      		{{ csrf_field() }}
                <div class="mws-form-inline">
      			<div class="mws-form-row">
      				<label class="mws-form-label">用户名</font></label>
      				<div class="mws-form-item">
      					<input type="text" name="uname" value="{{ old('uname')}}" class="small">
      				</div>
      			</div>
             <div class="mws-form-row">
                  <label class="mws-form-label">密码</font></label>
                  <div class="mws-form-item">
                       <input type="password" name="upass" value="{{ old('upass')}}" class="small">
                  </div>
             </div>
      			 <div class="mws-form-row">
                <label class="mws-form-label">确认密码</font></label>
                <div class="mws-form-item">
                     <input type="password" name="repass" value="{{ old('repass')}}" class="small">
                </div>
           </div>
            <div class="mws-form-row">
                <label class="mws-form-label">手机号</font></label>
                <div class="mws-form-item">
                     <input type="text" name="phone" value="{{ old('phone')}}" class="small">
                </div>
           </div>
           <div class="mws-form-row">
                <label class="mws-form-label">邮箱</font></label>
                <div class="mws-form-item">
                     <input type="text" name="email" value="{{ old('email')}}" class="small">
                </div>
           </div>
           <div class="mws-form-row">
                <label class="mws-form-label">身份</font></label>
                <div class="mws-form-item clearfix">
                     <ul class="mws-form-list inline">
                          <li><input type="radio" name="ldentity" value="1">管理员</li>
                          <li><input type="radio" name="ldentity" value="2">博主</li>
                          <li><input type="radio" name="ldentity" value="3" checked>普通用户</li>
                     </ul>
                </div>
           </div>
      		<div class="mws-button-row">
      			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="添加" class="btn btn-success"></font></font>
      			<input type="reset" value="重置" class="btn btn-info">
      		</div>
      	</form>
      </div>    	
  </div>

@endsection