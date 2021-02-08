{{-- profile.blade.php --}}

@extends('app.master')


@section('content')

	@include('sideber')

	<h1>Welcome {{$user->name}}</h1>
	<small>{{$user->email}}</small>

	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('logout') }}" method="post">
				@csrf
				<input type="submit" class="btn btn-primary" value="Logout">
			</form>
		</div>
	</div>

@endsection