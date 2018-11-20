$(function(){
    var IsUpass,IsReupass = false;
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
    $('form').submit(function(){
        if(IsUpass && IsReupass){
            return true;
        }else{
            return false;
        }
    });
});