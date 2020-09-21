<!DOCTYPE html>
<html>
<head>
	<title>Login Inforamtion</title>
</head>
<body>

	@extends('header')

	@section('content')
	<div class="container">
		<h1>Login Inforamtion</h1>
        <p style="color: red">Please import the database first. database file is in the zip file named movie_review.sql</p>
       
		
	@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Oh !</strong>{{ $error }}
				</div>
			@endforeach
		@endif


	<form method="post" >
		@csrf
<!-- 		{{csrf_field()}} -->		
<!-- 		<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
		Email: <input type="email" name="email" > <br>
        Password: <input type="password" name="password" ><br>
         <br>
<br>
		<input type="submit" name="submit" class="btn btn-primary" value="Submit" >
	</form>

	<h3>{{session('msg')}}</h3>

	
</div>
	
		
@endsection

</body>
</html>