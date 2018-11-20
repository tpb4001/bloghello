$(function(){
	var IsPhone,IsCode = false;
	// 手机号
    $('input[name=phone]').blur(function(){
        var phone = $('input[name=phone]').val();
        var re = /^1[3-9]{1}\d{9}$/;
        if (phone == '') {
            $(this).next().html('请输入联系电话');
        } else if (!re.test(phone)) {
            $(this).next().html('电话格式输入错误');
        } else {
            // 发送Ajax 验证手机号码是否存在
            $.get('/login/rephone',{'phone':phone},function(msg){
                if(msg == 'error'){
                	IsPhone = true;
                    $('input[name=phone]').next().html('');
                } else {
                    $('input[name=phone]').next().html('该手机号未注册用户');
                }
            },'html');
        }
    });
    // 发送验证码
    $('.form_text_ipt button').eq(0).click(function(){
    	var phone = $('input[name=phone]').val();
        if(phone == ''){
            alert('请正确输入手机号');
            return false;
        }else{
        	var phone = $('input[name=phone]').val();
            $.get('/login/CodeEdit',{'phone':phone},function(msg){
            	if (msg.return_code == "00000") {
                    var i = 30;
                    time=setInterval(function(){
                        $('.code').eq(0).attr('disabled',true);
                        $('.code').html('发送成功('+i+')');
                        i--;
                        if (i == 0) {
                            clearInterval(time);
                            $('.code').attr('disabled',false);
                            $('.code').html('获取验证码');
                        }   
                    },1000);
                }
            },'json');	
            return false;
        } 
    });
    // 验证码
    $('input[name=code]').blur(function(){
        var code = $('input[name=code]').val();
        if (code == '') {
            $(this).next().next().html('请输入验证码');
        } else if ( code.length != 4) {
            $(this).next().next().html('验证码格式错误');
        } else {
            IsCode = true;
            $(this).next().next().html('');
        }
    });
    $('form').submit(function(){
        if(IsPhone && IsCode){
            return true;
        }else{
            return false;
        }
    });
});