@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $notice->title }}</span>
    </div>
    <div class="mws-panel-body">
        <p>{!! $notice->content !!}</p>
    </div>
    <a href="/admin/notice" type="submit" value="返回" class="btn btn-danger" style="float: right;">返回</a>
    </div>
@endsection