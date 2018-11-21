@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
      	<div class="mws-panel-header">
          	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title }}</font></font></span>
          </div>
          <div class="mws-panel-body no-padding">
          	<form class="mws-form" action="/admin/cates" method="post">
          		{{ csrf_field() }}
          		<div class="mws-form-block">
          			<div class="mws-form-row">
          				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所属类别</font></font></label>
          				<div class="mws-form-item">
          					<select class="large" name="pid">
          						<option value="0">
          							<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--顶级分类--</font></font>
          						</option>
          						@foreach($cates as $k=>$v)
               						<option value="{{ $v->id }}">
               							<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->cname }}</font></font>
               						</option>
          						@endforeach
          					</select>
          				</div>
          			</div>
          			<div class="mws-form-row">
          				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类名称</font></font></label>
          				<div class="mws-form-item">
          					<input type="text" class="medium" name="cname">
          				</div>
          			</div>
          		</div>
          		<div class="mws-button-row">
          			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="提交" class="btn btn-danger"></font></font>
          			<input type="reset" value="重置" class="btn ">
          		</div>
          	</form>
          </div>
     </div>
@endsection