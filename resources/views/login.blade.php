@extends('app.master')

@section('title')
	Login Page
@endsection

@include('sideber')


@section('content')

	@include('messages')

	<h1>Login</h1>

	<form action="{{ route('post-login') }}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div>
			<input type="text" name="email">
		</div>
		<div>
			<input type="text" name="password">
		</div>
		<div>
			<input type="submit" name="Save">
		</div>
	</form>

@endsection