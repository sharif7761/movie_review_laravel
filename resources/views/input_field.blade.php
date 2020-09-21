<!DOCTYPE html>
<html>
<head>
    <title>Movie</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
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
        <h3 align="center">Add Movie</h3>
        <p style="color: red">Please import the database first. database file is in the zip file named movie_review.sql</p>
       
        <br /><br>
        
      <div class="table-responsive">
                   <form method="post" id="dynamic_form">
                    <span id="result"></span>
                    <table class="table table-bordered table-striped" id="user_table">
                  <thead>
                   <tr>
                      
                       <th scope="col">Movie Name</th>
                       <th scope="col">Genre</th>
                       <th scope="col">rating</th>
                       <th scope="col">release_date</th>
                       <th >Action</th>
                       
                   </tr>
                  </thead>
                  <tbody>
   
                  </tbody>
                  <tfoot>
                   <tr>
                                   <td colspan="2" align="right">&nbsp;</td>
                                   <td>
                     @csrf
                     <input type="submit" name="save" id="save" class="btn btn-primary" value="Save Movie" />
                    </td>
                   </tr>
                  </tfoot>
              </table>
                   </form>
      </div>
     </div>
    </body>
   </html>
   
   <script>
   $(document).ready(function(){
   
    var count = 1;
   
    dynamic_field(count);
   
    function dynamic_field(number)
    {
     html = '<tr>';
           html += '<td><input type="text" name="name[]" class="form-control" /></td>';
           html += '<td><input type="text" name="genre[]" class="form-control" /></td>';
           html += '<td><input type="text" name="rating[]" class="form-control" /></td>';
           html += '<td><input type="date" name="release_date[]" class="form-control" /></td>';
           if(number > 1)
           {
               html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
               $('tbody').append(html);
           }
           else
           {   
               html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add More Movies</button></td></tr>';
               $('tbody').html(html);
           }
    }
   
    $(document).on('click', '#add', function(){
     count++;
     dynamic_field(count);
    });
   
    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });
   
    $('#dynamic_form').on('submit', function(event){
           event.preventDefault();
           $.ajax({
               url:'{{ route("dynamic-field.insert") }}',
               method:'post',
               data:$(this).serialize(),
               dataType:'json',
               beforeSend:function(){
                   $('#save').attr('disabled','disabled');
               },
               success:function(data)
               {
                   if(data.error)
                   {
                       var error_html = '';
                       for(var count = 0; count < data.error.length; count++)
                       {
                           error_html += '<p>'+data.error[count]+'</p>';
                       }
                       $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                   }
                   else
                   {
                       dynamic_field(1);
                       $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                   }
                   $('#save').attr('disabled', false);
               }
           })
    });
   
   });
   </script>
   