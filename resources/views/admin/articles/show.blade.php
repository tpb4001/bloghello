@extends('admin.layout.index')

@section('content')
<div class="mws-panel grid_4 mws-collapsible">
                    <div class="mws-panel-header">
                        <span>{{$article->biaoti}}</span>
                    <div class="mws-collapse-button mws-inset"><span></span></div></div>
                    <div class="mws-panel-inner-wrap" style="display: block;"><div class="mws-panel-body">
                        <p>{!! $article->articleinfo->article !!}</p>
                    </div></div>
                </div>
@endsection