@extends('admin.layout.index')

@section('content')
	<ol class="breadcrumb">
    	<li><a href="/admin/category">类别管理</a></li>
    	<li><a href="/admin/category">添加类别</a></li>
  	</ol>
  	<div class="templatemo-content">
          <div class="row">
            <div class="col-md-12">
              <form role="form" id="templatemo-preferences-form">
                <div class="row">

                  <div class="col-md-6 margin-bottom-15">
                  	<font style="vertical-align: inherit;">父类</font>
                    <select class="form-control margin-bottom-15" id="singleSelect">
	                    @foreach($data as $k=>$v)
	                    <option value="{{$v->cid}}">
	                    	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->cname}}</font></font>	            
	                    </option> 
	                    @endforeach               
                  	</select>
                    <br>
                    <label for="firstName" class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">类别名称</font></font></label>
                    <input type="text" class="form-control" id="firstName" value="John">

                  </div>
                </div>               
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">更新</font></font></button>
                  <button type="reset" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">重启</font></font></button>    
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection