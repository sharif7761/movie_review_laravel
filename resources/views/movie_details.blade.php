<!DOCTYPE html>
<html>
<head>
	<title>Movie</title>
</head>
<body>

	@extends('header')

    @section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" >Movie Details</a>
        <a class="navbar-brand" href="{{URL::to('/add')}}">Add Movie</a>
        <a class="navbar-brand" href="{{URL::to('/table')}}">View Movie List</a>
        <a class="navbar-brand" href="{{URL::to('/profile')}}">Profile</a>
        <a class="navbar-brand" href="{{URL::to('/logout')}}">Logout</a>
       
       
      </nav>
	<div class="container">
        <h1>Movie Details</h1>
        <p style="color: red">Please import the database first. database file is in the zip file named movie_review.sql</p>
       
        <table class="table" style="float: center;margin:auto;text-align:center;">
            <tbody>
              <tr>
                <th ><strong>Movie Name</strong></th>
                <td>{{ $movie->name }} 
              
              </tr>
              <tr>
                <th ><strong>Genre</strong></th>
                <td>{{ $movie->genre }} 
              
              </tr>
              <tr>
                <th ><strong>Rating</strong></th>
                <td>{{ $movie->rating }} 
              
              </tr>
              <tr>
                <th ><strong>Release date</strong></th>
                <td>{{ $movie->release_date }} 
              
              </tr>
            </tbody>
        </table>

        <h1>User given Ratings of the movie</h1>
        <table class="table">
            <thead>
              <tr>
               
                <th scope="col">User Name</th>
                <th scope="col">Rating</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach($movie_rating as $rating)
              <tr>
              
                <td>{{ $rating->name }}</td>
                <td>{{ $rating->rating }}</td>
                
              </tr>
              @endforeach
</div>
	
		
@endsection

</body>
</html>