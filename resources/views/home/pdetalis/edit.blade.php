@extends('home.layout.detalis')

@section('content')
<div class="row">
	<form action="/Pdetalis/{{ $data->id }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<input type="hidden" name="uid" value="{{ $data->id }}">
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<span class="input-group-addon">旧密码</span>
				<input type="password" name="jupass" value="" class="form-control" placeholder="输入您的旧密码"  aria-describedby="basic-addon3">
			</div>
			<span style="display: none;"></span>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<span class="input-group-addon">新密码</span>
				<input type="password" name="upass" value="" class="form-control" placeholder="密码的长度为6位"  aria-describedby="basic-addon3">
			</div>
			<span style="display: none;"></span>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 20px;">
			<div class="input-group" >
				<span class="input-group-addon">确认密码</span>
				<input type="password" name="reupass" value="" class="form-control" placeholder="输入您新的密码" aria-describedby="basic-addon3">
			</div>
			<span style="display: none;"></span>
		</div>
		<div class="col-md-7 col-md-offset-2" style="padding-bottom: 40px;">
			<div class="input-group ">
				<input type="submit" class="btn btn-success"  value="保存">
			</div>
		</div>
	</form>
	<script type="text/javascript" src="/HomeStyle/js/home.user.Cpass.js"></script>
</div>
@endsection