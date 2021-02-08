<div class="div1">
	<ul class="ul1">

		<li><a href="/">Home</a></li>

		@if(!Auth::check())
			<li><a href="{{route('login')}}">Login</a></li>
			<li><a href="{{route('signup')}}">Sing Up</a></li>
		@endif
		
	</ul>
</div>