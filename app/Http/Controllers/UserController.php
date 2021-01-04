<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Message;
use App\Models\Favorite;
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
            $usertype = User::where(['email'=>$req->email])
                            ->pluck('usertype')
                            ->first();
            
            // Check if the user is admin
            if($usertype == 1)
            {
                $req->session()->put('user',$user);
                return view('banner-admin',['user'=>$user]);
            }
            else
            {
                $req->session()->put('user',$user);
                // $user_id = Session::get('user')['id'];
                // $user = User::where(['id'=>$user_id])->first();
                return view('layout-loggedin',['user'=>$user]);
            }
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
            // $user=$req->session()->get('user');
            $user_id = Session::get('user')['id'];
            $user = User::where(['id'=>$user_id])->first();
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
        return redirect('/');

    }

    public function profileUser(Request $req)
    {
        if(session()->has('user'))
        {
           
            $user_id = Session::get('user')['id'];
            $user = User::where(['id'=>$user_id])->first();
            
            $mycakes = DB::table('cart')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->join('products','cartdetails.product_id','=','products.id')
                        ->where('cart.user_id',$user_id)
                        ->where('cart.cart_status','=','1')
                        ->select('products.*')
                        ->get();

            $myfav   = DB::table('favorites')
                        ->join('products','favorites.product_id','=','products.id')
                        ->where('favorites.user_id',$user_id)
                        ->select('products.*')
                        ->get();
        
            
            return view ('profile-user',['user'=>$user ,'products'=>$mycakes , 'favorites'=>$myfav ]);
        }
    }

    public function EditProfileUser(Request $req)
    {
        $user=$req->session()->get('user');

        return view('profile-edit-user',['user'=>$user]);
    }

    public function SaveProfileUser(Request $req)
    {
        $user_id  =  Session::get('user')['id'];

        $image = $req->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/dp'),$imageName);

        User::where('id',$user_id)
                ->update([
                    'address'       =>   $req->location_user_edit,
                    'profile_photo' =>   $imageName,
                    'phoneno'       =>   $req->phoneno_user_edit
                ]);
        
        return redirect('profile');
    }

    public function contactUs(Request $req)
    {
        return view('contactus');
    }

    public function contact(Request $req)
    {
        $message = new Message;
        
        $message->name       =   $req->name;
        $message->phoneno    =   $req->number;
        $message->email      =   $req->email;
        $message->message    =   $req->msg;
        $message->save(); 
        return view('contactus');
    }
}
