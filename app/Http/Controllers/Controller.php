<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
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
        
        // if ($validator->fails()) 
        // { 
        //     return redirect('signup') ->withErrors($validator) ->withInput(); 
        // }

        // $validator =Validator::make($req->all(), 
        // [ 
        //     'name'                 => 'required',
        //     'email'                => "required|email|unique:users,email",
        // ]);

        // if ($validator->fails()) 
        // {
        //     return redirect('signup') ->withErrors($validator) ->withInput(); 
        // }

        // $req->validate([
        //     'name'                 => 'required',
        //     'email'                => "required|email|unique:users,email",
        // ]);

        // if ($validator->fails()) {
        //     return self::index($req)->withErrors($validator->errors());
        // }
             // $this->validate($request, 
        // [ 
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'email', 'vat_number' => 'max:13', 
        //     'password' => 'required|confirmed|min:6',
        //     'phoneno' => 'required|min:10|max:10',    
        // ]);
