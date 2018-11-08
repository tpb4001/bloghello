$(function(){
        //为表单元素添加失去焦点事件
        $("form :input").blur(function(){
            var $parent = $(this).parent();
            $parent.find(".msg").remove(); //删除以前的提醒元素（find()：查找匹配元素集中元素的所有匹配元素）
            //验证姓名
            if($(this).is("#name")){
                var nameVal = $.trim(this.value);
                var regName = /[~#^$@%&!*()<>:;'"{}【】  ]/;
                if(nameVal == "" || nameVal.length < 6 || regName.test(nameVal)){
                    var errorMsg = " 用户名非空，长度6位以上，不包含特殊字符！";
                    //class='msg onError' 中间的空格是层叠样式的格式
                    $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
                }
                else{
                    var okMsg=" 输入正确";
                    $parent.find(".high").remove();
                    $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
                }
            }
            //验证密码
            if($(this).is("#upass")){
                var upass = $.trim(this.value);
                // var regEmail = /.+@.+\.[a-zA-Z]{2,4}$/;
                if(upass== "" || upass.length < 6){
                    var errorMsg = " 密码长度6位以上！";
                    $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
                }
                else{
                    var okMsg=" 输入正确";
                    $parent.find(".high").remove();
                    $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
                }
            }
            // 确认密码
            if($(this).is('#reupass')){
  				var upass = $('#upass').val();
  				var reupass =$(this).val();
           		if(reupass == upass){
           			var errorMsg = " 输入正确!";
                    $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
           		}else{
           			var okMsg=" 再次输入密码!";
                    $parent.find(".high").remove();
                    $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
           		}
            }
        }).keyup(function(){
            //triggerHandler 防止事件执行完后，浏览器自动为标签获得焦点
            $(this).triggerHandler("blur"); 
        }).focus(function(){
            $(this).triggerHandler("blur");
        });
        
        //点击重置按钮时，通过trigger()来触发文本框的失去焦点事件
        $("#send").click(function(){
            //trigger 事件执行完后，浏览器会为submit按钮获得焦点
            $("form .required:input").trigger("blur"); 
            var numError = $("form .onError").length;
            if(numError){
                return false;
            }
            alert("注册成功！");
        });
});