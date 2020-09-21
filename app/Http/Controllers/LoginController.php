<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function index(Request $req){
    	return view('login');
    }

    public function profile(Request $req){
        $user_id=$req->session()->get('id');

        $user_info=DB::table('user')
            ->where('id',$user_id)
            ->first();
    	return view('profile',compact('user_info'));
    }
    public function verify(Request $req){
        
        $this->validate($req,[
            'email'=>'required',
            'password'=>'required',
           
            
        ]);

 /*       $req->uname 
        $req->password*/

        //$data = User::all();

/*        $user = User::where('username', $req->uname)
                    ->where('password', $req->password)
                    ->first();*/

        $user = DB::table('user')
                    ->where('email', $req->email)
                    ->where('password', $req->password)
                    
                    ->first();

    	if($user != null){
            
            $id=$req->session()->put('id', $user->id);
           $name= $req->session()->put('name', $req->email);
    		return redirect()->route('profile')->with($name,$id);
            
            
    	}else{
            $req->session()->flash('msg', 'invalid email/password');
    		//return view('login.index');
            return redirect('/login'); 
    	}
    }


    public function logout(Request $request)
    {
        $request->session()->flush();

   // return redirect()->back();
   return redirect('/');

    }
}
