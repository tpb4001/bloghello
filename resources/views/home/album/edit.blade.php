<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog Hello</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/nprogress.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/style.css">
<link rel="stylesheet" type="text/css" href="/HomeStyle/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="images/icon.png">
<link href="/HomeStyle/css/zzsc.css" rel="stylesheet" type="text/css"   />
<link rel="shortcut icon" href="images/favicon.ico">
<script src="/HomeStyle/js/jquery-2.1.4.min.js"></script>
<script src="/HomeStyle/js/nprogress.js"></script>
<script src="/HomeStyle/js/jquery.lazyload.min.js"></script>
<script src="/HomeStyle/js/bootstrap.min.js"></script>
<script src="/HomeStyle/js/jquery.ias.js"></script>
<script src="/HomeStyle/js/scripts.js"></script>
<script src="/layui-v2.4.5/layui/layui.all.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if gte IE 9]>
  <script src="/HomeStyle/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="/HomeStyle/js/html5shiv.min.js" type="text/javascript"></script>
  <script src="/HomeStyle/js/respond.min.js" type="text/javascript"></script>
  <script src="/HomeStyle/js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>
<body class="user-select">
	<header class="header">
	<nav class="navbar navbar-default" id="navbar">
		<div class="container">
			<div class="navbar-header">
				<h1 class="logo hvr-bounce-in"><a href="/" title="Blog Hello"><img src="/HomeStyle/images/201610171329086541.png" alt="Blog Hello"></a></h1>
			</div>
		  	<div class="collapse navbar-collapse" id="header-navbar">
		  	</div>
		</div>
		</nav>
	</header>
<!-- 内容 开始 -->
	<section class="container ">
		<h1 style="margin-bottom: 20px;">相片介绍</h1>
		<div class="bs-example" data-example-id="text-form-control">
			<img src="{{ $album->image }}" style="margin-top: 4px; margin-bottom: 10px;" class="img-thumbnail">
		    <form class="text-center" action="/report/create/{{ $id }}">
		    	{{ csrf_field() }}
		    	<input type="hidden" name="id" value="{{ $id }}">
		      <textarea type="text-top" name="content" class="form-control" style="resize: none; margin-bottom: 20px;margin-bottom: 20px;height: 100px;">精彩时刻，精彩记录</textarea>
		      <input type="submit" class="btn btn-info form-control" style="margin-bottom: 20px;"  value="保存">
		    </form>
		</div>
	</section>
	<script type="text/javascript">
		$('form').submit(function(){
			var data = $('textarea').val();
			// 文章id
			var id = $('input[name=id]').val();
			if(data != '' && data != '精彩时刻，精彩记录'){
				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
				});
				$.post('/myalbum/update',{'id':id,'data':data},function(msg){
					if (msg == 'error') {
						layer.msg('保存失败，请重新填写内容');
					} else {
						alert('保存成功');
						window.close();
					}
				},'html')
			} else {
				layer.msg('请输入您的信息');
			}
			return false;
		});
	</script>
<!-- 内容 结束 -->
<li id="rightClickMenu"></li>
</body>
</html>
