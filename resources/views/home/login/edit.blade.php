<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册界面</title>
	<link rel="stylesheet" href="/HomeStyle/login/css/reset.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/common.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/font-awesome.min.css" />
	<script type="text/javascript" src="/HomeStyle/login/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/HomeStyle/login/js/home_edit.js"></script>
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
						找回密码
					</div>
					<form action="/login/cpass" method="post">
						{{ csrf_field() }}
						<div class="form_text_ipt">
							<input name="phone" type="text" placeholder="手机号码">
							<span style="color: red;"></span>
						</div>
						<div class="form_text_ipt" style="border-right-width: 0px;">
							<input name="code" type="text" placeholder="验证码" style="width: 200px;">
							<button class="code" style="width: 84px;height: 41px;border-right-width: 2px;">获取验证码</button>
							<span style="color: red;"></span>
						</div>
						<span style="color: red; display: none;"></span>
						<div class="form_btn" style="margin-top: 20px;">
							<button type="submit">找回</button>
						</div>
					</form>
					<div class="other_login">
						<div class="left other_right">
							<span>启示语：</span>
						</div>
						<div class="align other_right">
							<span>人不可像走兽那样活着,应该追求知识和美德</span>
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
