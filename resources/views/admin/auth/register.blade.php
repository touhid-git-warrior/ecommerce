<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>

	@if(Session::get('key') == 200)

	<p>Success</p>

	@endif

	<form method="post" action="{{route('admin.doregister')}}">
		@csrf
		
	<input type="email" name="email" placeholder="Enter Email">

	@error('email')

	<p> {{$message}} </p>

	@enderror

	<br><br>

	<input type="password" name="password" placeholder="Enter Password">

	@error('password')

	<p> {{$message}} </p>

	@enderror

	<br><br>

	<input type="password" name="cpassword" placeholder="Enter cPassword">

	@error('cpassword')

	<p> {{$message}} </p>

	@enderror

	<br><br>

	<button> Submit </button>

	</form>


</body>
</html>