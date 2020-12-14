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
    <link href="{{ asset('css/styles_signup.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
   
</head>
<body class="body_banner">
    <div class="wrapper">

        <div class="sidebar">
            <div class="logo">
                <img class="cakeland_logo"src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
            
            <!-- sidebar links for all user level access -->

            <div class="container">
                <div class="sidebar_contents">
                    <li><a class="sidebar_link home" href="home">Home</a></li>
                    <li><a class="sidebar_link popular_cakes" href="popular-cakes">Popular Cakes</a></li>
                    <li><a class="sidebar_link birthday_cakes" href="birthday-cakes">Birthday Cakes</a></li>
                    <li><a class="sidebar_link anniversary_cakes" href="anniversary-cakes">Anniversary Cakes</a></li>
                    <li><a class="sidebar_link special_cakes" href="special-cakes">Special Cakes</a></li>   
                </div>
            </div>

        </div>

        <div class="container">
            <div class="box">
                <form action='signup' method="POST">
                    @csrf
                    <!-- username -->
                    <div class="input-container">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person signup_usernameIcon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        <input type="text" name="name" class="form-control signup_username" placeholder="Username">		
                    </div>
                    <!-- email -->
                    <div class="input-container">
                        <i class="fas fa-envelope signup_emailIcon"></i>
                        <input type="email" name="email" class="form-control signup_email"  placeholder="Email"/>
                    </div>
                    <!-- password -->
                    <div class="input-container">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock password_logo" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                        </svg>
                        <input type="password" name="password" class="form-control signup_password" id="Password" placeholder="Password"  >		
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
         </div>
    </div>

    <div class="container">
        <div class="body_banner">
            <div class="main_content">
                <div class="head">Cakes are special.</div>  
                <div class="head2">Every birthday, every celebration ends with something sweet, a cake, and people remember.</div>
                <form action="/search" class="form-group has-search">
                    <span class="fa fa-search form-control-feedback search_icon"></span>
                    <input type="text" name="query" class="form-control" placeholder="Search by name">
                </form>
            </div>  
        </div>
    </div>
</body>
</html>
