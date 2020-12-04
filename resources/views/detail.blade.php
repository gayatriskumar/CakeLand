@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_detail.css') }}" rel="stylesheet">
@endpush

<body>
    @section('content')

        <div class="box_detail">
            <h1 class="head_detail">Details</h1>
            <div class="imagebox_detail">
                <img class="image_detail" src="{{$product['image']}}">
            </div>
            <h2 class="name_detail">{{$product['name']}}</h2>
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
                        <span class="title">Availability:</span> <span class="available">In Stock</span>
                        @else
                        <span class="title">Availability:</span><span class="not_available">Out of Stock</span>
                        @endif
                    </div>
                    <h5 class="price_detail info_data"><span class="title">₹</span>{{$product['price']}}</h5>
                    <h5 class="taxinclusive_msg">(Inclusive of all taxes)</h5>
                </div>

            </div>
            

        </div>
    @endsection
</body>
