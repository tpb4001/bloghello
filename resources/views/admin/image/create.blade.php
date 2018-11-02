@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $image or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/image" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">链接路径</font></label>
                      	<div class="mws-form-item">
                           <input type="text" name="url" value="{{ old('iurl')}}" class="small">
                   		</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">图片</label>
    				<div class="mws-form-item">
				    <input type="file" name="image">
    				</div>
    			</div>
    			<div class="mws-form-item clearfix">
                     <ul class="mws-form-list inline">
                          <li><input type="radio" name="status" value="1">激活</li>
                          <li><input type="radio" name="status" value="2">未激活</li>
                     </ul>
                </div>
            </div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection