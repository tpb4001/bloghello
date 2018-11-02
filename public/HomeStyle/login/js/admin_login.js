$(function(){
	$("#upass").blur(function(){
 		if($('#upass').val() == ''){
 			alert('密码不能为空');
 		}
 	});
	$('form').submit(function(){
		var isUpass = false;
		user_vals=$('input[name=uname]').val();
		upass_vals=$('input[name=upass]').val();
		if (($('#upass').val() != '') && !isUpass) {
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
			$.post('/admin/login/ACname',{'uname':user_vals,'upass':upass_vals},function(msg){
				if (msg == 'error') {
						alert('用户名和密码不匹配');
					} else {
						isUpass=true;
						location.href='/admin';
					}
			},'html');
		};
		if (isUpass) {
			return true;
		}
		return false;
	});
});
 	
