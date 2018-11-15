@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/tags" method="post">
        		{{ csrf_field() }}
        		<div class="mws-form-block">
        			<div class="mws-form-row">
                        <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标签名字</font></font></label>
                        <div class="mws-form-item">
                            <input type="text" class="medium" name="tname">
                        </div>
                    </div>
                    <div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">URl地址</font></font></label>
        				<div class="mws-form-item">
        					<input type="text" class="medium" name="url">
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
        						<li><input type="radio" name="tagsclass" id="T1" checked value="blue"> <label for="T1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式1</font></font></label></li>
        						<li><input type="radio" name="tagsclass" id="T5" value="red"> <label for="T5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式2</font></font></label></li>
        						<li><input type="radio" name="tagsclass" id="T6" value="green"> <label for="T6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">样式3</font></font></label></li>
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