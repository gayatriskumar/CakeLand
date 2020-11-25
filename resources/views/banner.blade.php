@extends('layout')

<head>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" type="text/css" src="{{ asset('css/style.css') }}">
</head>

@section('content')

        <div class="wrapper">

            <div class="sidebar">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
                
                <ul>
                    <li><a class="categories" href="#">Categories</a></li>
                    <li><a class="inbox" href="#">Inbox</a></li>
                    <li><a class="profile" href="#"></i>Profile</a></li>
                </ul> 
        
            </div>

            

            <div class="login_box">
                <form action='login' method="POST">
                    @csrf
                    <input type="email" name="email" class="form-control login_email" id="Email" placeholder="Email">
                    <input type="password" name="password" class="form-control login_password" id="Password" placeholder="Password">
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>

            <div class="signup">
                Don't have an account? <a class="signup_link" href="signup">Sign Up</a>
            </div>

            <div class="main_content">
                <div class="head">Cakes are special.</div>  
                <div class="head2">Every birthday, every celebration ends with something sweet, a cake, and people remember.</div>
            </div>
        
        </div>

@endsection