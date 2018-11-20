@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">内联表格</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="form_layouts.html">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文章详情</font></font></label>
    				<div class="mws-form-item">
    					{{ $data->title }}
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">作者</font></font></label>
    				<div class="mws-form-item">
    					{{ $data->abc->uname }}
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文章内容</font></font></label>
    				<div class="mws-form-item">
    					{!! $data->articleinfo->article !!}
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<a href="/admin/report" class="btn btn-info">返回</a>
    		</div>
    	</form>
    </div>    	
</div>
@endsection