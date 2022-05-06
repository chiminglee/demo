@extends('layouts.app')
@section("content")
<div class="text-center"><a href="javascript:history.back()">回上頁</a></div>
<h2>修改留言</h2>
@if (\Session::has('message'))
<div class="alert alert-success text-center">
	<h2>{!! \Session::get('message') !!}</h2>
</div>
@endif
<div class="row">
<form name="form1" id="form" method="post" action="{{ url('/message', $message->id) }}" class="form-inline col-md-12 offset-md-0 col-lg-10 offset-lg-1">
	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="content">留言內容 *</label>
        <textarea name="content" id="content" class="form-control">{{$message->content}}</textarea>
    </div>
    
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

@stop