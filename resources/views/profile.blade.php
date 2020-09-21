<!DOCTYPE html>
<html>
<head>
    <title>Movie</title>
    
</head>
<body>

	@extends('header')

    @section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" >Movie Review</a>
        <a class="navbar-brand" href="{{URL::to('/add')}}">Add Movie</a>
        <a class="navbar-brand" href="{{URL::to('/table')}}">View Movie List</a>
        <a class="navbar-brand" href="{{URL::to('/profile')}}">Profile</a>
        <a class="navbar-brand" href="{{URL::to('/logout')}}">Logout</a>
       
       
      </nav>
	<div class="container">
        <p style="color: red">Please import the database first. database file is in the zip file named movie_review.sql</p>
       
        <h1>User Profile</h1>
        <table class="table" style="float: center;margin:auto;text-align:center;">
            <tbody>
              <tr>
                <th ><strong>Name</strong></th>
                <td>{{ $user_info->name }} 
              
              </tr>
              <tr>
                <th ><strong>Phone</strong></th>
                <td>{{ $user_info->phone }} 
              
              </tr>
              <tr>
                <th ><strong>Email</strong></th>
                <td>{{ $user_info->email }} 
              
              </tr>
              <tr>
                <th ><strong>Password</strong></th>
                <td>{{ $user_info->password }} 
              
              </tr>
            </tbody>
        </table>
</div>
	
		
@endsection

</body>
</html>