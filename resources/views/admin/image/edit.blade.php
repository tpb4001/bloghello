@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $image or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/image/{{ $data->id }}" method="post">
    		{{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-row">
            	<label class="mws-form-label">图片</label>
            	<input type="file" name="image">
            </div>
    			<div class="mws-form-item clearfix">
                     <ul class="mws-form-list inline">
                          <li><input type="radio" name="status" value="1">激活</li>
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