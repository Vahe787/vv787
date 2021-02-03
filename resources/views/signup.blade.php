@extends('app.master');

@section('content')
	<form action="/registr" method="post">
		@csrf
		<div>
			<label for="">name</label>
			<input type="text" name="name">
		</div>
		<div>
			<label for="">email</label>
			<input type="text" name="email">
		</div>
		<div>
			<label for="">age</label>
			<input type="number" name="age">
		</div>
		<div>
			<label for="">password</label>
			<input type="password" name="password">
		</div>
		<div>
			<input type="submit" value="Submit form">
		</div>
	</form>
@endsection