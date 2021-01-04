@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_order_admin.css') }}" rel="stylesheet">

    
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAICZLkEJ28fdz2B7fg5ihcR7fMSx-waKA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Kochi
        const kochi = { lat: 9.9312, lng: 76.2673 };
        // The map, centered at Kochi
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: kochi,
        });
        // The marker, positioned at kochi
        const marker = new google.maps.Marker({
          position: kochi,
          map: map,
        });
      }
    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@endpush

<body>
    
    @section('content')
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Order</h1>

        @if ($order_status == 1)
            <form action="/process_order">
                <input type="number" name="cart_id" value="{{$cart_id}}" style="visibility:hidden;">
                <button type="submit" class="assignorder_btn">Process Order</button>
            </form>
        @elseif($order_status == 2)
           <form action="/delivery-staff/{{$cart_id}}">
                <input type="number" name="cart_id" value="{{$cart_id}}" style="visibility:hidden;">
                <button type="submit" class="assignorder_btn">Assign Order</button>
            </form>
        @else
            <button class="assignorder_btn">Complete Order</button>
        @endif
       
       <!-- <a href="/delivery-staff"><button class="assignorder_btn">Assign Order</button></a>  -->
       
        
        <div class="user_box">
            <div class="image_box">
                <img class="dp_user" src="{{ asset('images/dp')}}/{{ $user->user_image }}" alt="user_dp">
                <div class="name_user">{{ $user->user_name }}</div>
            </div>
            <div class="phoneno_user"> <i class="fa fa-phone icon_order"></i>{{ $user->user_phoneno }}</div>
            <div class="address_user"><i class="fas fa-map-marker-alt icon_order"></i>{{ $user->user_place }}</div>
            <div id="map" class="map_user"></div>
        </div>        
        
        <div class="orders_wrapper flex-container">
            @foreach($order as $item)
                <div class="order_box flex-item">

                    <div class="name_item">{{$item->prod_name}} </div>
                    <span class="time_item">{{Carbon\Carbon::parse($item->prod_time)->format('H:i A')}} </span>
                    <div class="rating_item">
                        @for ($i = 0; $i < $item->prod_rating; $i++)
                            <div class="star">
                                <img src="{{ asset('images/categories/star_gold.png') }}" alt="star_gold">
                            </div>
                        @endfor
                        @for ($i = 0; $i < 5-$item->prod_rating; $i++)
                            <div class="star">
                                <img src="{{ asset('images/categories/gray_star.png') }}" alt="star_grey">
                            </div>
                        @endfor
                    </div>
                    <div class="item_details">
                        <div class="wt_item head_order">Weight : <span class="data_order">{{$item->prod_weight}}</span> </div>
                        <div class="qty_item head_order">Quantity : <span class="data_order">{{$item->prod_quantity}}</span> </div>
                        <div class="bl_item head_order">Select Base Layer : <span class="data_order">{{$item->prod_baselayer}}</span> </div>
                        <div class="msg_iem head_order">Message on The Cake : <br> <span class="data_order">{{$item->prod_message}}</span> </div>
                    </div>
                    
                </div>
            @endforeach      
        </div>


    </div>

    @endsection

    
</body>

