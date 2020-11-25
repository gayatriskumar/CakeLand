<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "username or password is incorrrect";
        }
        else
        {
            $req->session()->put('user',$user);
            return view('banner');
        }
    }
    
    function signup(Request $req)
    {
        $user = new User;
        
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->address = $req->address;
        $user->phoneno = $req->phoneno;
        $user->save();

        $usertype=$user->user_type;
        return view('banner');

    }
}
