$(function(){
	$('input[name=uname]').blur(function(){
		var uname = $('input[name=uname]').val();
		if(uname == ''){
			$("input[name=uname]").removeAttr("placeholder");
			$('input[name=uname]').attr('placeholder','用户名不能为空');
		}
	});
	$('input[name=upass]').blur(function(){
		var upass = $('input[name=upass]').val();
		if(upass == ''){
			$("input[name=upass]").removeAttr("placeholder");
			$('input[name=upass]').attr('placeholder','密码不能为空');
		}
	});
	$('form').submit(function(){
		var uname_val = $('input[name=uname]').val();
		var upass_val = $('input[name=upass]').val();
		if(!(uname_val == '') && !(upass_val == '') ){
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
			$.post('/login/yz',{'uname':uname_val,'upass':upass_val},function(msg){
				if (msg == 'error') {
						alert('用户名和密码不匹配');
					} else {
						location.href='/';
					}
			},'html');
		}
		return false;						
	});
});
