<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册界面</title>
	<link rel="stylesheet" href="/HomeStyle/login/css/reset.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/common.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/font-awesome.min.css" />
	<script type="text/javascript" src="/HomeStyle/login/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/HomeStyle/login/js/home_cpass.js"></script>
	<script type="text/javascript" src="/layui-v2.4.5/layui/layui.all.js"></script>
</head>
<body>
	<div class="wrap login_wrap">
		<div class="content">
			
			<div class="logo"></div>
			
			<div class="login_box">	
				@if (count($errors) > 0)
		            @foreach ($errors->all() as $error)
		               <script type="text/javascript"> 
		                layer.alert('{{ $error }}');
		               	</script>
		            @endforeach
				@endif
				<div class="login_form">
					<div class="login_title">
						注册
					</div>
					<form action="/login/update/{{ $user->id }}" method="post">
						{{ csrf_field() }}
						<div class="form_text_ipt">
							<input name="uname" type="text" value="您的用户名：{{ $user->uname }}" disabled  placeholder="用户名">
							<span style="color: red;"></span>
						</div>
						<div class="form_text_ipt">
							<input name="upass" type="password" placeholder="新的密码">
							<span style="color: red;"></span>
						</div>
						<div class="form_text_ipt">
							<input name="reupass" type="password" placeholder="确认密码">
							<span style="color: red;"></span>
						</div>
						<div class="form_btn" style="margin-top: 20px;">
							<button type="submit">注册</button>
						</div>
					</form>
					<div class="other_login">
						<div class="left other_right">
							<span>启示语：</span>
						</div>
						<div class="align other_right">
							<span>天才就是无止境刻苦勤奋的能力－－卡莱尔</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src="/HomeStyle/login/js/jquery.min.js" ></script>
	<script type="text/javascript" src="/HomeStyle/login/js/common.js" ></script> -->
</body>
</html>
