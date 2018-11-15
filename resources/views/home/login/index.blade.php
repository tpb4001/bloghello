 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录</title>
	<link rel="stylesheet" href="/HomeStyle/login/css/reset.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/common.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/HomeStyle/login/css/parg_denglu.css" />
	<script type="text/javascript" src="/HomeStyle/login/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/HomeStyle/login/js/home_denglu.js"></script>
	<script type="text/javascript" src="/layui-v2.4.5/layui/layui.all.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<div class="wrap login_wrap">
		<div class="content">
			<div class="logo"></div>
			<div class="login_box">	
			<!-- 注册成功提示信息 开始 -->
			@if (session('success'))
	           <script type="text/javascript">
	           		layer.alert('{{ session('success') }}');
	           </script>
	         @endif

	         @if (session('error'))
	         	<script type="text/javascript">
	           		layer.alert('{{ session('error') }}');
	           	</script>
	         @endif
			<!-- 注册成功提示信息 结束 -->
				<div class="login_form">
					<div class="login_title">
						登录
					</div>
					<form action="/login/yz" method="post">
						{{ csrf_field() }}
						<div class="form_text_ipt">
							<input name="uname" type="text" placeholder="用户名">
						</div>
						<div class="ececk_warning"><span></span></div>
						<div class="form_text_ipt">
							<input name="upass" type="password" placeholder="密码">
						</div>
						<div class="ececk_warning"><span></span></div>
						<div class="form_check_ipt">
							<div class="left check_left">
								<label><input name="" type="checkbox"> 下次自动登录</label>
							</div>
							<div class="right check_right">
								<a href="#">忘记密码</a>
							</div>
						</div>
						<div class="form_btn">
							<!-- <button type="submit" onclick="javascript:window.location.href='/login/yz'">登录</button> -->
							<input type="submit" id="parg_denglu" value="登录">
						</div>
						<div class="form_reg_btn">
							<span>还没有帐号？</span><a href="/login/create">马上注册</a>
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
	<script type="text/javascript" src="/HomeStyle/login/js/jquery.min.js" ></script>
	<script type="text/javascript" src="/HomeStyle/login/js/common.js" ></script>
	<div style="text-align:center;"></div>
</body>
</html>
