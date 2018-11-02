<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录界面</title>
	<link rel="stylesheet" href="/HomeStyle/login/css/reset.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/common.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/parg_denglu.css" />
	<script type="text/javascript" src="/HomeStyle/login/js/jquery-1.8.3.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<div class="wrap login_wrap">
		<div class="content">
			<div class="logo"></div>
			<div class="login_box">	
				
				<div class="login_form">
					<div class="login_title">
						后台登录
					</div>
					<form action="/admin/login/ACname" method="post">
						{{ csrf_field() }}
						<div class="form_text_ipt">
							<input id="uname" name="uname" type="text" placeholder="用户名">
						</div><br>
						<div class="ececk_warning"><span>用户名不能为空</span></div>
						<div class="form_text_ipt">
							<input id="upass" name="upass" type="password" placeholder="密码">
						</div><br>
						<div  class="ececk_warning"><span>密码不能为空</span></div>
						<div class="form_check_ipt">
							<div class="left check_left"></div>
							<div class="right check_right"></div>
						</div>
						<div class="form_btn">
							<!-- <button type="button" onclick="javascript:window.location.href='/login/ACname'">登录</button> -->
							<input type="submit" id="parg_denglu" value="登录">
						</div>
						<div class="form_reg_btn"></div>
					</form>
					<div class="other_login">
						<div class="left other_left">
						&nbsp;&nbsp;&nbsp;学的到东西的事情是锻炼，学不到的是磨练
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/HomeStyle/login/js/jquery.min.js" ></script>
	<script type="text/javascript" src="/HomeStyle/login/js/common.js" ></script>
	<script type="text/javascript" src="/HomeStyle/login/js/admin_login.js"></script>
	<div style="text-align:center;"></div>
</body>
</html>
