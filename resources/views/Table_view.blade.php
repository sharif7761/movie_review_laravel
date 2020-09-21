<!DOCTYPE html>
<html>
<head>
  <title>Movie</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <br />
        <h3 align="center">Movie List Table</h3>
        <p style="color: red">Please import the database first. database file is in the zip file named movie_review.sql</p>
        
        <h3 style="color: green;">{{session('msg')}}</h3>
      
        <br />
        <h3 style="color: lawngreen">Search Your Movie Here</h3>
        <input class="form-control" id="myInput" type="text" placeholder="Search here..">
        
      <div class="table-responsive" style="margin-top: 30px;">
       <table class="table">
           <thead>
             <tr>
              
               <th scope="col">Movie Name</th>
               <th scope="col">Genre</th>
               <th scope="col">rating</th>
               <th scope="col">release_date</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody id="myTable">
               @foreach($movie as $data)
             <tr>
            
               <td>{{ $data->name }}</td>
               <td>{{ $data->genre }}</td>
               <td>{{ $data->rating }}</td>
               <td>{{ $data->release_date }}</td>
               <td>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                   Add Rating
                 </button>
                 
                 <a type="button" class="btn btn-info" href="{{URL::to('/view_details/'.$data->id)}}">
                   View Details
                 </a>
                 </td>
             </tr>
   
   
   
             <!-- Modal -->
   <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add Your Rating </h5>
             
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <form action="" method="POST" >
                   @csrf
               <div class="row mt-3">
                                 
                   <div class="col-md-2">
                      <label for="">Movie name :</label>
                     <input type="text" name="" class="form-control" value="{{ $data->name }}" id="" readonly  required/>
   
                   </div>
                   <div class="col-md-2">
                       <label for="">Genre :</label>
                      <input type="text" name="" class="form-control" value="{{ $data->genre }}" id="" readonly  required/>
    
                    </div>
                    <div class="col-md-2">
                       <label for="">Rating :</label>
                      <input type="text" name="" class="form-control" value="{{ $data->rating }}" id="" readonly  required/>
    
                    </div>
                   
                    <div class="col-md-2">
                       <label for="">Release Date :</label>
                      <input type="text" name="" class="form-control" value="{{ $data->release_date }}" id=""  readonly required/>
    
                    </div>
                    <div class="col-md-2">
                       <label for="">Your Rating :</label>
                       <input type="text" name="rating" class="form-control"  placeholder="Enter Your Rating"  required/>
                    </div>
   
                   
                  
                 </div>
              
   
             
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" formaction="{{URL::to('/add_rating/'.$data->id)}}" class="btn btn-primary">Save Rating</button>
           </div>
       </form>
         </div>
       </div>
     </div>
            @endforeach
           </tbody>
         </table>
         
      </div>
     </div>


      <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
      </script> 

{{-- <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr td").filter(function() {
        $(this).toggle($(this).text().toLowerCase().startsWith(value))
      });
    });
  });
  </script> --}}

    </body>
   </html>