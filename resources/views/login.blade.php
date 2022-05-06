
@extends('layouts.app')
@section("content")

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if( isset( $message )  )
		<p class="warning">{{ $message }}</p>
	@endif
	<form method="post" action="{{ url('toLogin') }}">
		@csrf
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
			<small id="email" class="form-text text-muted">
				We'll never share your email with anyone else.
			</small>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
	
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endSection