@extends('admin.layout.index')


@section('content')

	<div class="mws-panel grid_8">
      	<div class="mws-panel-header">
          	<span>{{ $title or '' }}</span>
          </div>
          <div class="mws-panel-body no-padding">
          	<form class="mws-form" action="/admin/link/{{$data->id}}" method="post" enctype="multipart/form-data">
          		{{ csrf_field() }}
              {{ method_field('PUT') }}
               <div class="mws-form-inline">
          			<div class="mws-form-row">
          				<label class="mws-form-label">链接名称</font></label>
          				<div class="mws-form-item">
          					<input type="text" name="lname" value="{{ $data->lname }}" class="small">
          				</div>
          			</div>
               <div class="mws-form-row">
                    <label class="mws-form-label">链接路径</font></label>
                    <div class="mws-form-item">
                         <input type="text" name="url" value="{{ $data->url }}" class="small">
                    </div>
               </div>
               <div class="mws-form-row">
                    <label class="mws-form-label">链接logo</font></label>
                    <div class="mws-form-item">
                         <input type="file" name="image" value="{{ $data->image }}" class="small">
                    </div>
               </div>
              <div class="mws-form-row">
                            <label class="mws-form-label">状态</font></label>
                            <div class="mws-form-item clearfix">
                                 <ul class="mws-form-list inline">
                                      <li><input type="radio" name="status" value="1" checked>激活</li>
                                      <li><input type="radio" name="status" value="2">未激活</li>
                                 </ul>
                            </div>
                       </div>
          		<div class="mws-button-row">
          			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="修改" class="btn btn-success"></font></font>
          			<input type="reset" value="重置" class="btn btn-info">
          		</div>
          	</form>
          </div>    	
      </div>

@endsection