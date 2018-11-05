@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/index/{{ $data->id }}" method="post">
        		{{ csrf_field() }}
        		{{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">原密码</font></font></label>
        				<div class="mws-form-item">
        					<input type="password" name="jupass"  class="medium">
        				</div>
        			</div>
        			<div class="mws-form-row">
                        <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码</font></font></label>
                        <div class="mws-form-item">
                            <input type="password" name="upass"  class="medium">
                        </div>
                    </div>
                    <div class="mws-form-row">
        				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label>
        				<div class="mws-form-item">
        					<input type="password" name="repass"  class="medium">
        				</div>
        			</div>
        		<div class="mws-button-row">
        			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        				<input type="submit" value="确定" class="btn btn-danger"></font></font>
        		</div>
        	</form>
        </div>    	
    </div>
@endsection