$(function(){
	//验证旧密码
	$('input[name = jupass]').blur(function(){
		if(($(this).val()) == '') {
			$(this).removeAttr("placeholder");
			$(this).attr('placeholder','密码不能为空,输入您的旧密码');
		}
	});
	//验证新密码
	$('input[name = upass]').blur(function(){
		var upass = $('input[name = upass]').val();
		if (upass == '') {
			$(this).removeAttr("placeholder");
			$(this).attr('placeholder','密码不能为空,密码的长度为6位');
		} else if (upass.length < 6){
			$(this).parent().next().attr("style","padding-left: 80px; color: red; ");
			$(this).parent().next().html('密码的长度为6位');	
		} else {
			$(this).parent().next().attr("style","display:none;");
			// $(this).parent().next().html('密码');	

		}
	});
	// 验证两次密码是否一致
	$('input[name = reupass]').blur(function(){
		var upass = $('input[name = upass]').val();
		var reupass = $('input[name = reupass]').val();
		if(upass == '') {
			$(this).removeAttr("placeholder");
			$(this).attr('placeholder','密码不能为空,密码的长度为6位');
		} else if (upass != reupass) {
			$(this).parent().next().attr("style","padding-left: 80px; color: red; ");
			$(this).parent().next().html('密码不一致');
		} else {
			$(this).parent().next().attr("style","display:none;");
		}
	});
	$('form').submit(function(){
		var jupass = $('input[name = jupass]').val();
		var upass = $('input[name = upass]').val();
		var reupass = $('input[name = reupass]').val();
		var id = $('input[name = uid]').val();
		var IsJupass,IsUpass = false;
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});
		// 验证旧密码是否正确
		if((upass.length >= 6) && (upass == reupass)){
			$.post('/Pdetalis/Cpass',{'jupass':jupass,'upass':upass,'id':id},function(msg){
				if (msg == 'error') {
					$('input[name = jupass]').parent().next().attr("style","padding-left: 80px; color: red; ");
					$('input[name = jupass]').parent().next().html('密码错误');
				} else {
					$('input[name = jupass]').parent().next().attr("style","display:none;");
					$('input[name = jupass]').val('');
					$('input[name = upass]').val('');
					$('input[name = reupass]').val('');
					alert('修改成功');
					
				}
			},'html');
			return false;
		}else{
			return false;
		}
		
	});
});