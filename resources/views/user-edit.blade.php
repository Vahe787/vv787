@extends('app.master')

@section('content')
<form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
    	<label for="name">Name</label>
    	<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->name}}">
    	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
 	</div>
 	<div class="form-group">
    	<label for="exampleInputPassword1">Password</label>
    	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div>
    	<input type="file" name="image">
    </div>
  	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection