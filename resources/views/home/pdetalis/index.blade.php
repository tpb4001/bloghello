@extends('home.layout.detalis')

@section('content')
<div class="row">
	<form action="/Pdetalis/{{ $data->id }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<input type="hidden" name="upname" value="upname">
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px">
			<div class="input-group" >
				<img src="{{ $data->userinfo->avatar }}" style="height: 100px; height: 100px; ">
				<label for="file" class="btn btn-info" style="margin-top: 67px;margin-left: 20px;;">更换头像</label>
				<input id="file" type="file" name="avatar" style="display: none;" accept="image/gif, image/jpeg, image/jpg">
			</div>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<span class="input-group-addon" id="basic-addon3">用户名</span>
				<input type="text" name="uname" value="{{ $data->uname }}" class="form-control" disabled id="basic-url" aria-describedby="basic-addon3">
			</div>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<span class="input-group-addon" id="basic-addon3">&nbsp;邮 箱&nbsp;</span>
				<input type="text" name="email" value="{{ $data->userinfo->email }}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<span class="input-group-addon" id="basic-addon3">手机号</span>
				<input type="text" name="phone" value="{{ $data->userinfo->phone }}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<div class="form-group">
				    <label class="radio-inline">
				      <input type="radio" @if($data->userinfo->sex == 1) checked @endif value="1" name="sex">男性
				    </label>
				    <label class="radio-inline">
				      <input type="radio" @if($data->userinfo->sex == 2) checked @endif value="2" name="sex">女性
				    </label>
				    <label class="radio-inline">
				      <input type="radio" @if($data->userinfo->sex == 3) checked @endif value="3" name="sex">保密
				    </label>
				</div>
			</div>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 40px;">
			<div class="input-group" >
				<span class="input-group-addon" id="basic-addon3">&nbsp;介 绍&nbsp;</span>
				<textarea class="form-control" name="introduce" style="height: 110px; width: 590px; resize: none;">{{ $data->userinfo->introduce }}</textarea>
			</div>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 40px;">
			<div class="input-group" >
				<input type="submit" class="btn btn-success"  value="保存">
			</div>
		</div>
	</form>
</div>
@endsection