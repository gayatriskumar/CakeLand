<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
    function login(Request $req)
    {   
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            echo '<script>alert("Username or Password is incorrect")</script>';
            return view('layout-login');
        }
        else
        {
            return view('layout-loggedin',['user'=>$user]);
        } 
    }

    function logout(){
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('home');
    }
    
    function signup(Request $req)
    {
        $user = new User;
        
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->address = $req->address;
        $user->phoneno = $req->phoneno;
        // $this->validate($request, 
        // [ 
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'email', 'vat_number' => 'max:13', 
        //     'password' => 'required|confirmed|min:6',
        //     'phoneno' => 'required|min:10|max:10', 
        // ]);
        $user->save();

        $usertype=$user->user_type;
        return view('layout-login');

    }
}
