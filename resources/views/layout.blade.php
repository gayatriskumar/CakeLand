<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CakeLand</title>

    <link rel='stylesheet' id='font-awesome-css'  href='https://nepdoc.com/...../fonts/font-awesome.min.css' type='text/css' media='all' />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    @stack('styles')
    @stack('scripts')

   
</head>
<body>
    <div class="wrapper">

        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
            
            <ul>
                <li><a class="categories" href="categories">Categories</a></li>
                <li><a class="inbox" href="#">Inbox</a></li>
                <li><a class="profile" href="#"></i>Profile</a></li>
            </ul>

        </div>

        <div class="box">
            <form action='login' method="POST">
                @csrf
                <div class="input-container">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" class="form-control login_email" placeholder="Email" required=""/>		
                </div>
                <div class="input-container">
                    <input type="text" name="password" class="form-control login_password" id="Password" placeholder="Password">		
                </div>
                <button type="submit" class="login_btn">Login</button>
            </form>

            <div class="signup">
                Don't have an account? <a class="signup_link" href="signup">Sign Up</a>
            </div>
        </div>

    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
