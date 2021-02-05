@extends('app.master')

@section('css')
	<link rel="stylesheet" href="/css/main.css">
@endsection

@include('sideber')

@section('content')
	
	@include('messages')
	
	<form action="/registr" method="post">
		@csrf
		<section class="sec">
			<div class="div2">
				<div>
					<input type="text" name="name" placeholder="Your Name">
				</div>
				<div>
					<input type="text" name="email" placeholder="Your Email">
				</div>
				<div>
					<input type="text" name="age" placeholder="Your Age">
				</div>
				<div>
					<input type="password" name="password" placeholder="Your Password">
				</div>
				<div>
					<input type="submit" value="Login" class="sub">
				</div>
			</div>
		</section>
	</form>
@endsection