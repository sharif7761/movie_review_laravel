<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TableController extends Controller
{
    public function index(){
        $movie=DB::table('movie')->get();
        return view('table_view',compact('movie'));    
    }

    public function add_rating(Request $request,$id){
    
     $movie_id = $id;
     $user_id=$request->session()->get('id');

     
     $data=array();
    
     $data['user_id']=$user_id;
     $data['movie_id']=$movie_id;
      $data['rating']=$request->rating;
     
     $insert_address = DB::table('ratings')
    ->insert($data);

    $request->session()->flash('msg', ' Rating Added ');
    
     return Redirect()->back();
     
}

public function details(Request $request,$id){
    $movie_id = $id;
    $movie=DB::table('movie')
    ->where('id',$movie_id)
    ->first();

    $movie_rating=DB::table('ratings')
    ->join('user','user.id','=','ratings.user_id')
    ->where('movie_id',$movie_id)
    ->get();

    return view('movie_details',compact('movie','movie_rating'));  

}


}

