@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/article/{{ $data->id }}" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
            {{ method_field("PUT") }}
            <input type="hidden" name="uid" value="{{ $account->id }}">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章标题</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="title" value="{{ $data->title }}">
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">类别选择</font></font></label>
                    <div class="mws-form-item">
                        <select class="large" name="cid" style="width: 55%;">
                            @foreach($cates as $k=>$v)
                            <option value="{{ $v->id }}">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->cname }}</font></font>  
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章内容</label>
    				<div class="mws-form-item">
				 	<!-- 加载编辑器的容器 -->
				    <script id="container" name="article" type="text/plain" class="small">
                        {!! $data->articleinfo->article !!}

				    </script>
    				</div>
    			</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
 <!-- 实例化编辑器 -->

<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
@endsection