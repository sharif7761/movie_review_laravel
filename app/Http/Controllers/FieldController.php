<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class FieldController extends Controller
{
    public function index(){
        return view('input_field');    
    }

    function insert(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'name.*'  => 'required',
       'genre.*'  => 'required',
       'rating.*'  => 'required',
       'release_date.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $name = $request->name;
      $genre = $request->genre;
      $rating = $request->rating;
      $release_date = $request->release_date;
  
      for($count = 0; $count < count($name); $count++)
      {
       $data = array(
        'name' => $name[$count],
        'genre'  => $genre[$count],
        'rating' => $rating[$count],
        'release_date'  => $release_date[$count],
        
       );
       $insert_data[] = $data; 
      }

       DB::table('movie')->insert($insert_data);

     
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }

   
    
}
