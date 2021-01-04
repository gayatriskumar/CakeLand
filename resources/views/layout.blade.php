<?php
use App\Http\Controllers\ProductController;
$total=ProductController::cartItem();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CakeLand</title>

    <!-- <link rel='stylesheet' id='font-awesome-css'  href='https://nepdoc.com/...../fonts/font-awesome.min.css' type='text/css' media='all' /> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/styles_loggedin.css') }}" rel="stylesheet">

    @stack('styles')
    @stack('scripts')

   
</head>
<body>
    <div class="wrapper">

        <div class="sidebar">
            <div class="logo">
                <img class="cakeland_logo"src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
            
            <!-- sidebar links for all user level access -->

            <div class="container">
                <div class="sidebar_contents">
                    <li><a class="sidebar_link home" href="/">Home</a></li>
                    <li><a class="sidebar_link popular_cakes" href="popular-cakes">Popular Cakes</a></li>
                    <li><a class="sidebar_link birthday_cakes" href="birthday-cakes">Birthday Cakes</a></li>
                    <li><a class="sidebar_link anniversary_cakes" href="anniversary-cakes">Anniversary Cakes</a></li>
                    <li><a class="sidebar_link special_cakes" href="special-cakes">Special Cakes</a></li>
                    <?php
                    if(session()->has('user'))
                    {   
                    ?>
                    <li><a class="sidebar_link profile_user" href="profile"></i>Profile</a></li>
                    <li><a class="sidebar_link cart" href="cart"></i>Cart <div class="no_of_items"> {{$total}} </div></a></li>
                    <li><a class="sidebar_link contact" href="contact"></i>Contact</a></li>
                    <?php    
                    }
                    ?>   
                </div>
            </div>

        </div>

        <div class="container">


            <?php
                use Illuminate\Http\Request;
                use App\Models\User;

            
            if(session()->has('user'))
            {
            $user_id = Session::get('user')['id'];
            $user = User::where(['id'=>$user_id])->first();
            ?>
                <div class="box">
                    <div class="dp">
                        <img class="image_dp" src="{{ asset('images/dp')}}/{{ $user['profile_photo'] }}">
                    </div>
                    <h2 class="name_loggedin">{{$user['name']}}</h2>
                    <h2 class="email_loggedin">{{$user['email']}}</h2>
                    <div class="logout_btn">
                        <a href="logout">
                        <img class="logout_img" src="{{ asset('images/loggedin/logout.png') }}"><span class="logout_txt">Log Out</span> 
                        </a>
                    </div>
                </div>
            <?php    
            }
            else
            {
            ?>
                <div class="box">
                    <form action='user' method="POST">
                        @csrf
                        <!-- email -->
                        <div class="input-container">
                            <i class="fas fa-envelope email_logo"></i>
                            <input type="text" name="email" class="form-control login_email" placeholder="Email" required=""/>		
                        </div>
                        <!-- password -->
                        <div class="input-container">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock password_logo" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                            </svg>
                            <input type="password" name="password" class="form-control login_password" id="Password" placeholder="Password" required=""/>		
                        </div>
                        <!-- login button -->
                        <button type="submit" class="login_btn">Login</button>
                    </form>
                    <!-- signup link -->
                    <div class="signup">
                        Don't have an account? <a class="signup_link" href="signup">Sign Up</a>
                    </div>
                </div>
            <?php
            } 
            ?>
        </div>    
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
