<?php
use App\Http\Controllers\ProductController;
$total= ProductController::cartItem();
?>

@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_cart.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<body>
    @section('content')
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Cart</h1>
        <h2 class="head_itemdetails">Item Details</h2>
        <span class="head_noofitems">{{$total}} Items</span>

        <!-- cake box -->
        <div class="cart_list">
            @foreach($products as $items)
                <div class="box_categories">
                    <a class="atag" href="detail/{{$items->id}}">
                        <div class="box_categories_image">
                            <img class="image_categories" src="{{$items->image}}">
                        </div>

                        <div class="ordernow_btn">
                            <button class="ordernow_txt">Remove Item</button>
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
                            <h5 class="description_cart txt_forhover">
                                <div class="brand_categories txt_forhover">Brand: {{$items->brand}}</div>
                                <div class="product_code_categories txt_forhover">Product Code: {{$items->name}}</div>
                                <div class="rewardpoints_categories txt_forhover">Reward Point: {{$items->reward_point}}</div>
                            </h5>

                            <div class="cart_youpay">You Pay: </div>
                            <h5 class="cart_price txt_forhover"><span class="rupee txt_forhover">₹</span>{{$items->price}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        

    </div>

    @endsection
</body>

