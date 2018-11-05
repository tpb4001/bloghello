@extends('admin.layout.index');


@section('content')

     <div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span>{{ $title or '' }}</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form class="mws-form" action="/admin/message/{{$data->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }}
                    <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">留言用户名称</font></font></label>
                         <div class="mws-form-item">
                              <input type="text" class="large" value="{{ $data->uname }}" readonly="readonly">
                          </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">留言内容</font></font></label>
                         <div class="mws-form-item">
                              <input type="text" class="large" value="{{ $data->umes }}" readonly="readonly">
                          </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">留言时间</font></font></label>
                         <div class="mws-form-item">
                              <input type="text" class="large" value="{{ $data->time }}" readonly="readonly">
                          </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">回复留言</font></font></label>
                         <div class="mws-form-item">
                             <textarea rows="" cols="" name="huifu" class="large autosize" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 130px;"></textarea>
                         </div>
                    </div>
                   <div class="mws-button-row">
                         <input type="submit" value="提交" class="btn btn-danger">
                    </div>
               </form>
          </div>         
     </div>

@endsection