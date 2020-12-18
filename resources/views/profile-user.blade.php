@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_profile.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<body>
    @section('content')

    <h1 class="head_categories">Profile</h1>

    <div class="upper_wrapper">

        <div class="img_box">
            <div class="dp_profile">
                <img class="user_dp" src="{{ asset('images/dp.png') }}">
            </div>
            <div class="user_name">{{$user['name']}}</div>
        </div>

        <div class="email_box">
            <i class="fas fa-envelope icon_profile"></i>
            <div class="box_head">Email ID:</div>
            <div class="user_data">{{$user['email']}}</div>
        </div>

        <div class="location_box">
            <i class="fas fa-map-marker-alt icon_profile"></i>
            <div class="box_head">Location:</div>
            <div class="user_data">Info Park, Near Smart City, Kakkanad, Cochin-682 030</div>
        </div>

        <div class="Phoneno_box">
            <i class="fa fa-phone icon_profile"></i>
            <div class="box_head">Phone no:</div>
            <div class="user_data user_phoneno">{{$user['phoneno']}}</div>
        </div>

        <div class="edit_button"><img class="edit_icon" src="https://img.icons8.com/metro/26/ffffff/edit.png"/></div>
    </div>

    <div class="ordersnfav">
        <p>
            <button class=" btn_profile" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                My Cakes
            </button>
            <button class="btn_profile" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                My Favorites
            </button>
        </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="categories_wrapper profile_wrapper">
                        <div class='some-page-wrapper'>
                            <div class="categories_list flex-container mycakes_container">
                                        @foreach($products as $items)
                                            <div class="box_categories flex-item">
                                                <a class="atag" href="detail/{{$items->id}}">
                                                    <div class="box_categories_image">
                                                        <img class="image_categories" src="{{$items->image}}">
                                                    </div>
                                                    <div class="ordernow_btn">
                                                        <button class="ordernow_txt">Order Now</button>
                                                    </div>
                                                    <div class="box_categories_details">
                                                        <div class="name_categories txt_forhover">{{$items->name}}</div>
                                                        <div class="favorite_categories">
                                                            <img src="{{ asset('images/categories/fav.png') }}" alt="star_gold">
                                                        </div>
                                                        <div class="box_categories_rating">
                                                            @for ($i = 0; $i < $items->rating; $i++)
                                                                <div class="star">
                                                                    <img src="{{ asset('images/categories/star_gold.png') }}" alt="star_gold">
                                                                </div>
                                                            @endfor
                                                            @for ($i = 0; $i < 5-$items->rating; $i++)
                                                                <div class="star">
                                                                    <img src="{{ asset('images/categories/gray_star.png') }}" alt="star_grey">
                                                                </div>
                                                            @endfor
                                                        </div>
                                                        <div class="box_categories_availability">
                                                            @if ($items->qty_available >= 1)
                                                                Availability: <span class="available">In Stock</span>
                                                            @else
                                                                Availability: <span class="not_available">Out of Stock</span>
                                                            @endif
                                                        </div>
                                                        <h5 class="description_categories txt_forhover">{{$items->description}}</h5>
                                                        <h5 class="description_price txt_forhover"><span class="rupee txt_forhover">₹</span>{{$items->price}}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                        </div>
                    </div>

                        
                </div>
            </div>
    </div>

       
    @endsection
</body>

