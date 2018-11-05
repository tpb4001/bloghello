@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $image or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/image/{{ $data->id }}" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-row">
            	<div id="" class="mws-form-row">
              <label class="mws-form-label">全名<span class="required">*</span></label>
              <div class="mws-form-item">
                  <input type="text" name="iname" value="{{ $data->iname }}" class="small">
              </div>
          </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">链接路径</font></label>
            	<div class="mws-form-item">
                 <input type="text" name="iurl" value="{{ $data->iurl }}" class="small">
         		  </div>
    			</div>
            	<label class="mws-form-label">图片</label>
            		<input	type="file" name="image"><br>	
            </div>
    			<div class="mws-form-item clearfix">
                     <ul class="mws-form-list inline">
                          <li><input type="radio" name="status" value="1" checked>激活</li>
                          <li><input type="radio" name="status" value="2">未激活</li>
                     </ul>
                </div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection