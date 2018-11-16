$(function(){
	var IsUname,IsUpass,IsReupass,IsPhone,IsEmail = false;
    // 用户名
    $('input[name=uname]').focus(function(){
      $(this).parent().next().html('用户名:只能以字母开头和数字,长度为6-16个字符');
    }).blur(function(){
      var uname = $('input[name=uname]').val();
      var re = /^[a-zA-Z]{1}[a-zA-Z0-9]{6,18}$/;
      if (uname == '') {
          $(this).parent().next().html('用户名不能为空');
      } else if (uname.length < 6 ||uname.length > 18) {
          $(this).parent().next().html('格式错误,长度应为6-18个字符');
      } else if (!re.test(uname)) {
          $(this).parent().next().html('格式错误,只能包含字母,数字和下划线');
      } else {
          // 查看用户名是否存在
          $.get('/login/reuname',{'uname':uname},function(msg){
              if(msg == 'error'){
                  $('input[name=uname]').parent().next().html('用户名已注册');
              } else {
                  IsUname = true;
                  $('input[name=uname]').parent().next().html('');
              }
          },'html')
      }
    });
    // 密码
    $('input[name=upass]').focus(function(){
        $(this).parent().next().html('密码:由英文字母大小写和数字,长度不能少于6个字符');
    }).blur(function(){
        var upass = $('input[name=upass]').val();
        var re = /^(?=.*\d)(?=.*[a-zA-Z])[\da-zA-Z]{6,}$/;
        if (upass == '') {
            $(this).parent().next().html('请输入密码');
        } else if (upass.length < 6) {
            $(this).parent().next().html('格式错误,,密码长度至少为6位');
        } else if (!re.test(upass)) {
            $(this).parent().next().html('格式错误,必须包含英文字母大小写和数字');
        } else {
            IsUpass = true;
            $(this).parent().next().html('');
        }
    });
    // 确认密码
    $('input[name=reupass]').focus(function(){
        var upass = $('input[name=upass]').val();
        if (upass != '') {
            $(this).parent().next().html('再次输入密码');
        } 
    }).blur(function(){
        var upass = $(this).val();
        var reupass = $(this).val();
        if (reupass == '') {
            $(this).parent().next().html('请确认密码');
        } else if (upass != reupass) {
            $(this).parent().next().html('两次密码输入不一致');
        } else {
            IsReupass = true;
            $(this).parent().next().html('');
        }
    });
    // 手机号
    $('input[name=phone]').blur(function(){
        var phone = $('input[name=phone]').val();
        var re = /^1[3-9]{1}\d{9}$/;
        if (phone == '') {
            $(this).parent().next().html('请输入联系电话');
        } else if (!re.test(phone)) {
            $(this).parent().next().html('电话格式输入错误');
        } else {
            // 发送Ajax 验证手机号码是否存在
            $.get('/login/rephone',{'phone':phone},function(msg){
                if(msg == 'error'){
                    $('input[name=phone]').parent().next().html('手机号已注册');
                } else {
                    IsPhone = true;
                    $('input[name=phone]').parent().next().html('');
                }
            },'html');
        }
    });
    // 电子邮箱
    $('input[name=email]').blur(function(){
        var email = $('input[name=email]').val();
        var re = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
        if (email == '') {
            $(this).parent().next().html('请输入电子邮箱');
        } else if (!re.test(email)) {
            $(this).parent().next().html('邮箱格式输入错误');
        } else {
            IsEmail = true;
            $('input[name=phone]').parent().next().html('');
        }
    });
    $('form').submit(function(){
    	if (IsUname && IsUpass && IsReupass && IsPhone && IsEmail) {
	    	return true;
	    } else {
	    	return false;
	    }
    });
    
});