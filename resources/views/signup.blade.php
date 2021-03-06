@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_sign_up.css') }}" rel="stylesheet">
@endpush


@section('content')
    <div class="signup_box">

        <h1 class="head_signup">Sign up</h1>

            <form method="POST">
            @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control signup_input" id="exampleInputName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control signup_input" id="exampleInputEmail1"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control signup_input" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="number" name="phoneno" class="form-control signup_input" id="exampleInputPhoneno" placeholder="Phoneno">
                </div>
                <div class="form-group">
                    <input type="textarea" name="address" class="form-control signup_input" id="exampleInputAddress" placeholder="Address">
                </div>
                <button type="submit" class="btn btn-primary signup_btn">Sign up</button>
            </form>
    </div>
    
    
@endsection


@section('user_log')
    <div class="box">
            <form action='signup' method="POST">
                @csrf
                <!-- username -->
                <div class="input-container">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person signup_usernameIcon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    <input type="text" name="name" class="form-control signup_username" placeholder="Username" required=""/>		
                </div>
                <!-- email -->
                <div class="input-container">
                    <i class="fas fa-envelope signup_emailIcon"></i>
                    <input type="email" name="email" class="form-control signup_email"  placeholder="Email" required=""/>
                </div>
                <!-- password -->
                <div class="input-container">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock password_logo" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                    </svg>
                    <input type="password" name="password" class="form-control signup_password" id="Password" placeholder="Password">		
                </div>
                <!-- confirm password -->
                <div class="input-container">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock confirm_password_logo" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                    </svg>
                    <input type="password" name="password_confirmation" class="form-control signup_confirm_password" id="Password" placeholder="Confirm Password">		
                </div>
                <!-- signup button -->
                <button type="submit" class="login_btn">Sign Up</button>
            </form>
        </div>
        <div class="login">
            Already a user? <a class="login_link" href="home">Login</a>
        </div>
    @endsection

    <link href="{{ asset('css/styles_signup.css') }}" rel="stylesheet">

    @section('content')

        <div class="main_content">
            <div class="head">Cakes are special.</div>  
            <div class="head2">Every birthday, every celebration ends with something sweet, a cake, and people remember.</div>
            <form action="/search" class="form-group has-search">
                <span class="fa fa-search form-control-feedback search_icon"></span>
                <input type="text" name="query" class="form-control" placeholder="Search by name">
            </form>
        </div>
        
@endsection