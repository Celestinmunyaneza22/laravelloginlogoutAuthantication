<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;

class AuthController extends Controller
{
    //
    public function Register(){
        return view("user.register");
    }
    public function RegisterUser(Request $request){
        // echo 'Done';
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $res=$user->save();
        if($res){
            return back()->with('success','registered successfully');
        }else{
            return back()->with('fail','fail to register');
        }
    }

    public function Login(){
        return view("user.login");
    }
    public function LoginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $user=User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
              $request->session()->put('loginId',$user->id);
              return redirect('home');
            }else{
                return back()->with('fail','password does not match!');
            }
        }else{
            return back()->with('fail','email not registered!');
        }
    }
    public function Home(){
         $data  = array();
        if(Session::has('loginId')){
             $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view('home',compact('data'));
    }
    public function Logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
