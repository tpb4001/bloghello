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
	                            <button type="button" class="btn btn-danger btn-small">样式2</button>
	                            <button type="button" class="btn btn-primary btn-small">样式3</button>
	                            <button type="button" class="btn  btn-small">样式4</button>
	                            <button type="button" class="btn btn-inverse btn-small">样式5</button>
	                            <button type="button" class="btn btn-warning btn-small">样式6</button>
	                        </div>
	                    </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">选择样式</font></font></label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'btn btn-success btn-small') checked @endif id="T1" value="btn btn-success btn-small"> <label for="T1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式1</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'btn btn-danger btn-small') checked @endif id="T2" value="btn btn-danger btn-small"> <label for="T2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式2</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'btn btn-primary btn-small') checked @endif id="T3" value="btn btn-primary btn-small"> <label for="T3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式3</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'btn  btn-small') checked @endif id="T4" value="btn  btn-small"> <label for="T4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式4</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'btn btn-inverse btn-small') checked @endif id="T5" value="btn btn-inverse btn-small"> <label for="T5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式5</font></font></label></li>
        						<li><input type="radio" name="tagsclass" @if($data->tagsclass == 'btn btn-warning btn-small') checked @endif id="T6" value="btn btn-warning btn-small"> <label for="T6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式6</font></font></label></li>
        					</ul>
        				</div>
        			</div>
        		</div>
        		<div class="mws-button-row">
        			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="提交" class="btn btn-danger"></font></font>
        			<input type="reset" value="Reset" class="btn ">
        		</div>
        	</form>
        </div>
    </div>
@endsection