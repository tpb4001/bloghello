@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/tags/{{ $data->id }}" method="post">
        		{{ csrf_field() }}
                {{ method_field('PUT') }}
        		<div class="mws-form-block">
        			<div class="mws-form-row">
                        <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标签名字</font></font></label>
                        <div class="mws-form-item">
                            <input type="text" class="medium" name="tname" value="{{ $data->tname }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">URL地址</font></font></label>
        				<div class="mws-form-item">
        					<input type="text" class="medium" name="url" value="{{ $data->url }}">
        				</div>
        			</div>
        			<div class="mws-panel-content">
	        			<div style="margin-bottom:16px; margin-left: 20px;">
	                        <p style="margin:0;">样式</p>
	                        <div class="btn-toolbar">
	                            <button type="button" class="btn btn-success btn-small">样式1</button>
	                            <button type="button" class="btn btn-inverse btn-small">样式2</button>
	                            <button type="button" class="btn btn-warning btn-small">样式3</button>
	                        </div>
	                    </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">选择样式</font></font></label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'tagc1') checked @endif id="T1" value="tagc1"> <label for="T1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式1</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'tagc2') checked @endif id="T5" value="tagc2"> <label for="T5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式2</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'tagc5') checked @endif id="T6" value="tagc5"> <label for="T6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式3</font></font></label></li>
        					</ul>
        				</div>
        			</div>
        		</div>
        		<div class="mws-button-row">
        			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="保存" class="btn btn-danger"></font></font>
        		</div>
        	</form>
        </div>
    </div>
@endsection