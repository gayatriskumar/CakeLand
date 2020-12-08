<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Validator;



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
            $req->session()->put('user',$user);
            return view('layout-loggedin',['user'=>$user]);
        } 
    }

    function logout()
    {
        if(session()->has('user'))
        {
            session()->pull('user');
        }
        return view('banner');
    }

    function userAccess(Request $req)
    {
        if(session()->has('user'))
        {
            $user=$req->session()->get('user');
            return view ('banner',['user'=>$user]);
        }
        else
        {
            return view('banner');
        }
    }
    
    function signup(Request $req)
    {
        // $this->validate(
        //     $req,
        //     [
        //         'name'                 => 'required',
        //         'email'                => "required|email|unique:users,email",
        //         // 'current_password'     => 'required|checkcurrentpass',
        //         // 'new_password'         => 'required',
        //         // 'confirm_new_password' => 'required|same:new_password',
        //     ]
        // );
        // $validatedData = $req->validate(
        //     [ 
        //         'name'                 => 'required',
        //         'email'                => "required|email|unique:users,email",
        //     ]
            
        // );
        // 
        // if ($validator->fails()) 
        // { 
        //     return redirect('signup') ->withErrors($validator) ->withInput(); 
        // }

        
        $req->validate([
            'name'                 => 'required',
            'email'                => "required|email|unique:users,email",
        ]);

        if ($validator->fails()) {
            return self::index($req)->withErrors($validator->errors());
        }

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
        return view('banner');

    }
}
