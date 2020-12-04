@extends('banner')

@push('styles')
    
@endpush

<body>
    @section('sidebar_links')
    <div class="sidebar_contents">
        <ul>
                    <!-- <li><a class="categories" href="categories">Categories</a></li>
                    <li><a class="inbox" href="#">Inbox</a></li>
                    <li><a class="profile" href="#"></i>Profile</a></li> -->

            <li><a class="sidebar_link home" href="home">Home</a></li>
            <li><a class="sidebar_link popular_cakes" href="popular-cakes">Popular Cakes</a></li>
            <li><a class="sidebar_link birthday_cakes" href="#">Birthday Cakes</a></li>
            <li><a class="sidebar_link anniversary_cakes" href="#">Anniversary Cakes</a></li>
            <li><a class="sidebar_link special_cakes" href="#">Special Cakes</a></li>
            <!-- <li><a class="sidebar_link contact" href="#"></i>Contact</a></li> -->
        </ul>    
    </div>
    @endsection

    @section('user_log')
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
                    <input type="text" name="password" class="form-control login_password" id="Password" placeholder="Password" required=""/>		
                </div>
                <!-- login button -->
                <button type="submit" class="login_btn">Login</button>
            </form>
            <!-- signup link -->
            <div class="signup">
                Don't have an account? <a class="signup_link" href="signup">Sign Up</a>
            </div>
        </div>
    @endsection
</body>