<?php
    use App\Models\CartDetail;                           
?>


@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_inbox_admin.css') }}" rel="stylesheet">

    
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<body>
    
    @section('content')
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Inbox</h1>

        <!-- cake box -->
        
            <div class="inbox_wrapper flex-container">
                @foreach($order as $odr)
                    <a href="order-admin/{{$odr->id}}">
                        <div class="order_box flex-item">
                            <div class="image_box"><img class="dp_order" src="{{ asset('images/dp')}}/{{ $odr->user_image }}" alt="User_image"></div>
                            <div class="details_box">
                                <?php
                                    $total= Cartdetail::where('order_id',$odr->id)->count();
                                ?>
                                <h1 class="name_order">{{$odr->user_name}}</h1>
                                <h2 class="place_order">{{$odr->user_place}}</h2>
                                <h1 class="noofitems_order">{{$total}} Items</h1>
                                <span class="time_order">{{Carbon\Carbon::parse($odr->user_time)->format('H:i A')}}</span>
                                <!-- <div class="status_order">New Order</div> -->
                                @if ($odr->status == 1)
                                    <button class="status_order new_order">New Order</button>
                                @elseif($odr->status == 2)
                                    <button class="status_order processing_order"> <img class="btn_icon_inbox" src="{{ asset('images/admin/Inbox-orderprocessing.png') }}"> Order Processing</button>
                                @elseif($odr->status == 3)
                                    <button class="status_order out_for_delivery"> <img class="btn_icon_inbox" src="{{ asset('images/admin/Inbox-outfordelivery.png') }}"> Out For Delivery</button>
                                @else
                                    <button class="status_order delivery_sucessful"> <img class="btn_icon_inbox" src="{{ asset('images/admin/Inbox-deliverysuccessful.png') }}">Delivery Successful</button>
                                @endif
                            </div>
                        </div>
                    </a>       
                @endforeach
            </div>
    </div>

    @endsection

    
</body>

