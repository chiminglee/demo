
@extends('layouts.app')
@section("content")
@if (\Session::has('message'))
<div class="alert alert-success text-center">
	<h2>{!! \Session::get('message') !!}</h2>
</div>
@endif

<h1>留言板</h1>

@if(Auth::check())
    <a href="message/create">新增留言</a>
@endif
<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>content</th>
        @if(Auth::check())
            <th>管理</th>
        @endif
    </tr>
    @foreach($messages as $key => $message)
    <tr>
        <td>{{$message->id}}</td>
        <td>{{$message->name}}</td>
        <td>{{$message->content}}</td>
        @if(Auth::check())
            <td>
                @if(Auth::user()->id == $message->user_id)
                    <a href="{{ url('message/' . ($message->id ?? '') . '/edit' ) }}">修改</a>
                    <form action="{{ url( 'message/' . ( $message->id ) ) }}" method="post" class="form_del" >
                        <input name="_method" type="hidden" value="DELETE"/>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <button type="submit" class="btn btn-danger">刪除</button>
                    </form>
                @endif
            </td>
        @endif
    </tr>
    @endforeach
</table>

<script>

    //刪除
    $("table").delegate(".form_del", "submit", function( e ) {
        var url = $(this).attr("action");

        if( !confirm( "確定刪除嗎?" ) ) {
            e.preventDefault();
        }
    });

</script>
@stop