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
                    <li><a class="sidebar_link home" href="home">Home</a></li>
                    <li><a class="sidebar_link popular_cakes" href="popular-cakes">Popular Cakes</a></li>
                    <li><a class="sidebar_link birthday_cakes" href="categories">Birthday Cakes</a></li>
                    <li><a class="sidebar_link anniversary_cakes" href="categories">Anniversary Cakes</a></li>
                    <li><a class="sidebar_link special_cakes" href="categories">Special Cakes</a></li>
                    @yield('sidebar_links')
                </div>
            </div>

        </div>

        <div class="container">
            @yield('user_log')
        </div>

    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
