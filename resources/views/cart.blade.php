<?php
use App\Http\Controllers\ProductController;
$total= ProductController::cartItem();
// $tot_cost = ProductController::cartcalc();

$delivery_cost=0;
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

        @if ( $total === 0 )

            <div class="emptycart">
                Sorry !! <br>
                Cart is empty.
            </div>

        @else
            <div class="categories_wrapper">
                <div class="upperhead">
                    <!-- heading -->
                <h1 class="head_categories">Cart</h1>
                <h2 class="head_itemdetails">Item Details</h2>
                <!-- no of items in cart -->
                <span class="head_noofitems">{{$total}} Items</span>

                </div>
                

                <!-- cake box -->
                <div class="cart_list">
                    @foreach($products as $items)
                        <div class="box_categories">
                            <a class="atag" href="detail/{{$items->id}}">
                                <div class="box_categories_image">
                                    <img class="image_categories" src="{{ asset('images/admin/cakes')}}/{{ $items->image }}">
                                </div>

                                <div class="ordernow_btn">
                                    <!-- <button class="ordernow_txt">Remove Item</button> -->
                                    <!-- <a href="/removecart/{{$items->cart_id}}" class="removeitem_txt">Remove Item</a> -->
                                   
                                    <a href="/removecart/{{$items->id}}" class="removeitem_txt">Remove Item</a>
                                   

                                </div>
                                <div class="box_categories_details">
                                    <div class="name_categories txt_forhover">{{$items->name}}</div>
                                    <div class="favorite_categories">
                                        <!-- <img src="{{ asset('images/categories/fav.png') }}" alt="star_gold"> -->
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

                <div class="charges_box">

                    <!-- Shipping and delivery charge message -->
                    <span class="shipmsg">Delivery and other options can be selected later.</span>

                    <!-- Total and delivery charges -->
                    <div class="charges">

                        Total:  <span class="costinfig">Rs {{$products[0]->total_cost}} </span> <br>

                        @if($delivery_cost == 0)
                            Delivery Charges: <span class="deliverycharge">Free</span> 
                        @else
                            Delivery Charges: <span class="deliverycharge">{{$delivery_cost}}</span>
                        @endif

                    </div>
                    <div class="finalcharge">
                        <div class="youpay">You Pay:</div>
                        <div class="charge">Rs. <span class="totalcharge">{{$products[0]->total_cost}}</span> </div> 
                    </div>

                    <form action="checkout">
                        <button type="submit" class="ckeckout_btn">Check out</button>
                    </form>
                    


                </div>

            </div>

        @endif
    @endsection
</body>

