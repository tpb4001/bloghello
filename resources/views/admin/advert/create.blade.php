@extends('admin.layout.index')


@section('content')
      <!-- 显示验证信息 开始 -->

             @if (count($errors) > 0)
                 <div class="mws-form-message error">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
           <!-- 显示验证信息 结束 -->
  <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>{{ $title or '' }}</span>
          </div>
          <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/advert" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="mws-form-inline">
                <div class="mws-form-row">
                  <label class="mws-form-label">广告名称</font></label>
                  <div class="mws-form-item">
                    <input type="text" name="aname" value="{{ old('aname')}}" class="small">
                  </div>
                </div>
               <div class="mws-form-row">
                    <label class="mws-form-label">广告路径</font></label>
                    <div class="mws-form-item">
                         <input type="text" name="url" value="{{ old('url')}}" class="small">
                    </div>
               </div>
               <div class="mws-form-row">
                    <label class="mws-form-label">广告图片</font></label>
                    <div class="mws-form-item">
                         <input type="file" name="image" value="{{ old('image')}}" class="small">
                    </div>
               </div>
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="添加" class="btn btn-success"></font></font>
                <input type="reset" value="重置" class="btn btn-info">
              </div>
            </form>
          </div>      
      </div>

@endsection