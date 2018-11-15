$(function(){
    var IsUname,IsUpass,IsReupass,IsPhone,IsCode = false;
    // 用户名
    $('input[name=uname]').focus(function(){
        $(this).next().html('用户名:只能以字母开头和数字,长度为6-18个字符');
    }).blur(function(){
        var uname = $('input[name=uname]').val();
        var re = /^[a-zA-Z]{1}[a-zA-Z0-9]{6,18}$/;
        if (uname == '') {
            $(this).next().html('用户名不能为空');
        } else if (uname.length < 6 ||uname.length > 18) {
            $(this).next().html('格式错误,长度应为6-18个字符');
        } else if (!re.test(uname)) {
            $(this).next().html('格式错误,只能包含字母,数字和下划线');
        } else {
            // 查看用户名是否存在
            $.get('/login/reuname',{'uname':uname},function(msg){
                if(msg == 'error'){
                    $('input[name=uname]').next().html('用户名已注册');
                } else {
                    IsUname = true;
                    $('input[name=uname]').next().html('');
                }
            },'html')
        }
    });
    // 密码
    $('input[name=upass]').focus(function(){
        $(this).next().html('密码:由英文字母大小写和数字,长度不能少于6个字符');
    }).blur(function(){
        var upass = $('input[name=upass]').val();
        var re = /^(?=.*\d)(?=.*[a-zA-Z])[\da-zA-Z]{6,}$/;
        if (upass == '') {
            $(this).next().html('请输入密码');
        } else if (upass.length < 6) {
            $(this).next().html('格式错误,,密码长度至少为6位');
        } else if (!re.test(upass)) {
            $(this).next().html('格式错误,必须包含英文字母大小写和数字');
        } else {
            IsUpass = true;
            $(this).next().html('');
        }
    });
    // 确认密码
    $('input[name=reupass]').focus(function(){
        var upass = $('input[name=upass]').val();
        if (upass != '') {
            $(this).next().html('再次输入密码');
        } 
    }).blur(function(){
        var upass = $(this).val();
        var reupass = $(this).val();
        if (reupass == '') {
            $(this).next().html('请确认密码');
        } else if (upass != reupass) {
            $(this).next().html('两次密码输入不一致');
        } else {
            IsReupass = true;
            $(this).next().html('');
        }
    });
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
                    $('input[name=phone]').next().html('手机号已注册');
                } else {
                    IsPhone = true;
                    $('input[name=phone]').next().html('');
                }
            },'html');
        }
    });
    // 发送验证码
    $('.form_text_ipt button').eq(0).click(function(){
        if(!IsPhone){
            alert('请正确输入手机号');
            return false;
        }else{
            var phone = $('input[name=phone]').val();
            $.get('/login/sendMobileCode',{'phone':phone},function(msg){
                if (msg.return_code == "00000") {
                    var i = 30;
                    time=setInterval(function(){
                        $('button').eq(0).attr('disabled',true);
                        $('.code').html('发送成功('+i+')');
                        i--;
                        if (i == 0) {
                            clearInterval(time);
                            $('.code').attr('disabled',false);
                            $('.code').html('获取验证码');
                        }   
                    },1000);
                }
                return false;
            },'json');

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
        if(IsUname && IsUpass && IsReupass && IsPhone && IsCode){
            return true;
        }else{
            return false;
        }
    });
});