@extends('app.master')

@section('css')
	<link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
	
	<form action="{{route('store-posts')}}" method="post">
		@csrf
		<textarea name="data" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="Save" class="btn btn-info">
	</form>

@endsection