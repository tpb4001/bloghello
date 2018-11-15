@extends('home.layout.detalis')

@section('Dh')
	<li>
		<a data-cont="Blog Hello" title="基本信息" href="/Bdetalis">基本信息</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="文章发布" href="/detalis/article/create">文章发布</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="浏览文章" href="/detalis/article">浏览文章</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="个人相册" href="/myalbum">个人相册</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="关注" href="#">关注</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="修改密码" href="/Bdetalis/{{ session('uname') }}/edit">修改密码</a>
	</li>
	<li>
		<a data-cont="Blog Hello" title="返回首页" href="/">返回首页</a>
	</li> 
@endsection()

@section('content')
{{ csrf_field() }}
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>照片上传</legend>
</fieldset> 
<div class="layui-upload">
  <button class="layui-btn layui-btn-normal" id="file_album" type="button">选择多文件</button> 
  <div class="layui-upload-list">
    <table class="layui-table">
      <thead>
        <tr><th>文件名</th>
        <th>大小</th>
        <th>状态</th>
        <th>操作</th>
      </tr></thead>
      <tbody id="demoList"></tbody>
    </table>
  </div>
  <button class="layui-btn" id="file_album_Action" type="button">开始上传</button>
  <a href="/myalbum" class="layui-btn">返回</a>
</div>
<script type="text/javascript">
	layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
 
  //多文件列表示例
  var demoListView = $('#demoList')
  ,uploadListIns = upload.render({
    elem: '#file_album'
    ,url: '/myalbum/uploads'
    ,data:{'_token':$('input[name=_token]').eq(0).val()}
    ,field:'profile'
    ,accept: 'file'
    ,multiple: true
    ,auto: false
    ,bindAction: '#file_album_Action'
    ,choose: function(obj){   
      var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
      //读取本地文件
      obj.preview(function(index, file, result){
        var tr = $(['<tr id="upload-'+ index +'">'
          ,'<td>'+ file.name +'</td>'
          ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
          ,'<td>等待上传</td>'
          ,'<td>'
            ,'<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>'
            ,'<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete">删除</button>'
          ,'</td>'
        ,'</tr>'].join(''));
        
        //单个重传
        tr.find('.demo-reload').on('click', function(){
          obj.upload(index, file);
        });
        
        //删除
        tr.find('.demo-delete').on('click', function(){
          delete files[index]; //删除对应的文件
          tr.remove();
          uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
        });
        
        demoListView.append(tr);
      });
    }
    ,done: function(res, index, upload){
      if(res.code == 0){ //上传成功
        var tr = demoListView.find('tr#upload-'+ index)
        ,tds = tr.children();
        tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
        tds.eq(3).html(''); //清空操作
        return delete this.files[index]; //删除文件队列已经上传成功的文件
      }
      this.error(index, upload);
    }
    ,error: function(index, upload){
      var tr = demoListView.find('tr#upload-'+ index)
      ,tds = tr.children();
      tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
      tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
    }
  });

  });
  
</script>
@endsection 