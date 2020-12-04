@extends('banner')

@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/styles_loggedin.css') }}" rel="stylesheet">
@endpush

<body>
    @section('sidebar_links')
    <div class="sidebar_contents">
        <ul>
            <li><a class="sidebar_link home" href="home">Home</a></li>
            <li><a class="sidebar_link popular_cakes" href="popular-cakes">Popular Cakes</a></li>
            <li><a class="sidebar_link birthday_cakes" href="categories">Birthday Cakes</a></li>
            <li><a class="sidebar_link anniversary_cakes" href="categories">Anniversary Cakes</a></li>
            <li><a class="sidebar_link special_cakes" href="categories">Special Cakes</a></li>
            <li><a class="sidebar_link profile_user" href="#"></i>Profile</a></li>
            <li><a class="sidebar_link cart" href="#"></i>Cart</a></li>
            <li><a class="sidebar_link contact" href="#"></i>Contact</a></li>
        </ul>    
    </div>
    @endsection

    @section('user_log')
    <div class="box">
        <div class="dp">
            <img class="image_categories" src="{{ asset('images/loggedin/dp.svg') }}">
        </div>
        <h2 class="name_loggedin">{{$user['name']}}</h2>
        <h2 class="email_loggedin">{{$user['email']}}</h2>
        <div class="logout_btn">
            <a href="logout">
            <img class="logout_img" src="{{ asset('images/loggedin/logout.png') }}"><span class="logout_txt">Log Out</span> 
            
            </a>
        </div>
    </div>

    @endsection

    @section('content')

        <div class="main_content">
            <div class="head">Cakes are special.</div>  
            <div class="head2">Every birthday, every celebration ends with something sweet, a cake, and people remember.</div>
            <form action="/search" class="form-group has-search">
                <span class="fa fa-search form-control-feedback search_icon"></span>
                <input type="text" name="query" class="form-control" placeholder="Search by name">
                <!-- <div class="form-control-feedback">
                    <input type="image" class="search_icon" src="{{ asset('images/search.png')}}">
                    <img type="submit" class="search_icon" src="{{ asset('images/search.png') }}" alt="">
                </div> -->
            </form>
        </div>
                
    @endsection


</body>