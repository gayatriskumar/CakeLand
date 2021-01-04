@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_delivery_staff_admin.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@endpush

<body>
    
    @section('content')
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Delivery Staff</h1>

        <!-- cake box -->
        
            <div class="delivery_staff_wrapper flex-container">

            @foreach($del_staff as $ds)
                <div class="staff_box flex-item">
                    <div class="image_box"><img class="dp_order" src="{{ asset('images/admin/delivery_staff')}}/{{ $ds->ds_dp }}" alt="User_image"></div>
                    <div class="details_box">
                        <h1 class="name_staff">{{ $ds->ds_name }}</h1>
                        @if ($ds->ds_status == 0)
                             <div class="available_btn"></div>
                             <span class="available_staff">Available</span>
                             <form action="/assign_order">
                                <input style="visibility:hidden;" type="number" name="agent_id" value='{{ $ds->ds_id }}'>
                                <button type="submit" class="assign_staff_btn">Assign</button>
                             </form>     
                        @else
                            <div class="busy_btn"></div>  
                            <span class="busy_staff">Busy</span>
                            <button class="assign_staff_btn" disabled style="opacity:0.3;">Assign</button>
                        @endif
                    </div>
                </div>
            @endforeach
               
            </div>
    </div>

    @endsection

    
</body>
