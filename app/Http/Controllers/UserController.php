<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;



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
        $validator = Validator::make($req->all(), 
        [
            'name'                      => 'required',
            'email'                     => "required|email|unique:users,email",
            'password'                  => 'required|min:5|max:10',
            'password_confirmation'     => 'required|same:password',
        ]);
        
        if ($validator->fails()) 
        {
             return redirect('signup') ->withErrors($validator) ->withInput(); 
        }
        

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

    public function profileUser(Request $req)
    {
        if(session()->has('user'))
        {
            $user=$req->session()->get('user');
            $user_id = Session::get('user')['id'];
            
            $mycakes = DB::table('cart')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->join('products','cartdetails.product_id','=','products.id')
                        ->where('cart.user_id',$user_id)
                        ->select('products.*')
                        ->get();
            
            // echo "<pre>";
            // print_r($products);
            // die();
            return view ('profile-user',['user'=>$user ,'products'=>$mycakes ]);
        }
    }

    public function contactUs(Request $req)
    {
        return view('contactus');
    }

    public function contact(Request $req)
    {
        $message = new Message;
        
        $message->name  =   $req->name;
        $message->phoneno  =   $req->number;
        $message->email =   $req->email;
        $message->message   =   $req->msg;
        $message->save(); 
        return view('contactus');
    }
}
