@extends('layouts.app')
@section("content")
<div class="text-center"><a href="javascript:history.back()">回上頁</a></div>
<h2>修改會員資料</h2>
@if (\Session::has('message'))
<div class="alert alert-success text-center">
	<h2>{!! \Session::get('message') !!}</h2>
</div>
@endif
<div class="row">
<form name="form1" id="form" method="post" action="{{ url('/user', $user->id) }}" class="form-inline col-md-12 offset-md-0 col-lg-10 offset-lg-1">
	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="請輸入使用者名稱" value="{{ old('name') ?? $user->name }}" required>
        <small id="email" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="email">Email *</label>
        <input type="text" class="form-control required" id="email" name="email" aria-describedby="" placeholder="請輸入 Email" value="{{ old('email') ?? $user->email }}" required>
        <small id="email" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
        <label for="password">password *</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="" placeholder="請輸入 password" value="" required>
        <small id="password" class="form-text text-muted"></small>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

@stop