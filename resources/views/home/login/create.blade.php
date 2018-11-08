<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册界面</title>
	<link rel="stylesheet" href="/HomeStyle/login/css/reset.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/common.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/font-awesome.min.css" />
	<script type="text/javascript" src="/HomeStyle/login/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/HomeStyle/login/js/home_login.js"></script>
</head>
<body>
	<div class="wrap login_wrap">
		<div class="content">
			
			<div class="logo"></div>
			
			<div class="login_box">	
				
				<div class="login_form">
					<div class="login_title">
						注册
					</div>
					<form action="/login/store" method="post">
						{{ csrf_field() }}
						<div class="int form_text_ipt">
				            <input type="text" id="name" name="uname" class="required" placeholder="用户名" >
				        </div>
				        <div class="int form_text_ipt">
				            <input type="password"  name="upass" id="upass" class="required" placeholder="密码" >
				        </div>
				        <div class="int form_text_ipt">
				            <input type="password"  name="reupass" id="reupass" class="required" placeholder="确认密码" />
				        </div>
				        <div class="int form_btn">
				            <button type="submit" value="注册" id="send">注册</button>
				        </div>
						<div class="form_reg_btn">
							<span>已有帐号？</span><a href="/login">马上登录</a>
						</div>
					</form>
					<div class="other_login">
						<div class="left other_left">
							<span>其它登录方式</span>
						</div>
						<div class="right other_right">
							<a href="#"><i class="fa fa-qq fa-2x"></i></a>
							<a href="#"><i class="fa fa-weixin fa-2x"></i></a>
							<a href="#"><i class="fa fa-weibo fa-2x"></i></a>
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
