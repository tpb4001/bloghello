$(function(){
	// 修改头像
	layui.use('upload', function(){
	  var $ = layui.jquery
	  ,upload = layui.upload;
	  //设定文件大小限制
	  upload.render({
	    elem: '#user_avatar'
	    ,url: '/Bdetalis/uploads'
	    ,data:{'_token':$('input[name=_token]').eq(0).val()}
	    ,size: 60 //限制文件大小，单位 KB
	    ,done: function(res){
	      // 上传完毕回调
	      if (res.code == 0) {
	      	//修改头像
	      	$('.input-group img').eq(0).attr('src',res.data.src)
	      } else {
	      	layer.msg(res.msg,{icon:5});
	      }
	    }
	  });
	});
});