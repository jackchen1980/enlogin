<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
     }
    public function registerUser(Request $Request){
        $Request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        $user= new User();
        $user->name= $Request->name;
        $user->email= $Request->email;
        $user->password= Hash::make($Request->password);
        $flag=$user->save();
        if($flag){
            return back()->with('success','You have regist successfully!');
        }else{
            return back()->with('fail','Somthing worng');
        }
     }
     public function loginUser(Request $Request){
        $Request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $user=User::where('email','=',$Request->email)->first();
        if($user){
            if(Hash::check($Request->password,$user->password)){
                        //echo('right here');
                $Request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','This password is not correct');
            }

        }else{
            return back()->with('fail','This email is not registered!');
        }


     }
     public function dashboard(){
        $data=Array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
            var_dump(Session::get('loginId'));
        } else {
            var_dump(" no session");
        }
        return view('dashboard',compact('data'));
     }
     public function logout(){
        if(session::has('loginId')){
            session::pull('loginId');
            return redirect('login');
        }
     }
}
