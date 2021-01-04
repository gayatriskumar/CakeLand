@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_detail.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<body>
    @section('content')

        <div class="box_detail">
            <h1 class="head_detail">Details</h1>
            <div class="imagebox_detail">
                <img class="image_detail" src="{{ asset('images/admin/cakes')}}/{{ $product['image'] }}">
            </div>
            <h2 class="name_detail">{{$product['name']}}</h2>
            <img class="location" src="{{ asset('images/categories/location.png') }}" alt="location">
            <img class="share" src="{{ asset('images/categories/share.png') }}" alt="share">
            <?php
                if(session()->has('user'))
                {                            
            ?>
                @if($fav_flag == 0)
                    <a href="/add_favorite/{{$product['id']}}"><img class="favorite_before" src="{{ asset('images/categories/Favorite_before.png') }}" alt="favorite_before"></a>
                @else
                    <a href="/remove_favorite/{{$product['id']}}"><img class="favorite_after" src="{{ asset('images/categories/fav.png') }}" alt="favorite_after"></a> 
                @endif
            <?php
                }                                     
            ?>

           <div class="rating_detail">
                @for ($i = 0; $i < $product['rating']; $i++)
                    <div class="star">
                        <img src="{{ asset('images/categories/star_gold.png') }}" alt="star_gold">
                    </div>
                @endfor
                @for ($i = 0; $i < 5-$product['rating']; $i++)
                    <div class="star">
                        <img src="{{ asset('images/categories/gray_star.png') }}" alt="star_grey">
                    </div>
                @endfor
            </div>

            <div class="wrapper_details">
                <h5 class="description_detail">{{$product['description']}}</h5>

                <div class="info">
                    <h5 class="brand_detail info_data"> <span class="title">Brand: </span>{{$product['brand']}}</h5>
                    <h5 class="productcode_detail info_data"><span class="title">Product Code: </span>{{$product['name']}}</h5>
                    <h5 class="rewardpoints_detail info_data"><span class="title">Reward Point: </span>{{$product['reward_point']}}</h5>
                    <div class="availability_detail info_data">
                        @if ($product['qty_available'] >= 1)
                        <span class="title">Availability:</span> <span class="available"> In Stock</span>
                        @else
                        <span class="title">Availability:</span><span class="not_available"> Out of Stock</span>
                        @endif
                    </div>
                    <h5 class="price_detail info_data"><span class="title">₹</span>{{$product['price']}}</h5>
                    <h5 class="taxinclusive_msg">(Inclusive of all taxes)</h5>
                </div>
            </div>

            <?php
                if(session()->has('user'))
                {                            
            ?>
               <div class="order_details">
                    <h3 class="preference_head">Order Preference</h3>
                    <div class="container-fluid">
                        <form class="form-inline" action="cart" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value={{$product['id']}}>
                            <input type="hidden" name="price" value={{$product['price']}}>
                            <div class="form-group">
                                <label for="inlineFormMessage" class="m-2">Weight</label><br>
                                <select class="form-control" name="weight" id="inlineFormMessage" required>
                                <option disabled="disabled" selected="selected">--Select--</option>
                                <option>1</option>
                                <option>2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormControlSelect2">Select base layer</label><br>
                                <select class="form-control" name="baselayer" id="inlineFormControlSelect2" required>
                                <option disabled="disabled" selected="selected">--Select--</option>
                                <option>Red Velvet</option>
                                <option>German Chocolate</option>
                                <option>Boston Cream Pie</option>
                                <option>Black Forest</option>
                                <option>Butterscotch</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormControlSelect3">Quantity</label><br>
                                <select class="form-control" name="quantity" id="inlineFormControlSelect3" required>
                                <option disabled="disabled" selected="selected">--Select--</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormControlInput1">Message on Cake</label><br>
                                <input type="text" name="message" class="form-control message_on_cake" id="inlineFormControlInput1" required>
                            </div>
                            <br><br>
                            @if ($product['qty_available'] >= 1)
                            <button type="submit" class="place_order_btn">Place Order</button>
                            @else
                            <span class="title">Sorry !</span><span class="not_available"> Out of Stock</span>
                            @endif
                            
                        </form>
                    </div>
                </div>
            <?php
                }
                else
                {
            ?>
                <h3 class="msgbeforeLogin">Please Login or signup to Place an Order</h3>
            <?php       
                }                                    
            ?>
           
            
        </div>
    @endsection
</body>


