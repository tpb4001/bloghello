@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $notice->title }}</span>
    </div>
    <div class="mws-panel-body">
        <p>{!! $notice->content !!}</p>
    </div>
    </div>
@endsection