@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_deliverylocation.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<body>
    @section('content')
    
            <h1 class="head_categories head_deliverylocation">Delivery Location</h1>
            <p class="delivery_msg">Give us your location. We shall find and deliver!</p>
            
            <!-- Order details -->
            <div class="order_details">
                    <h3 class="preference_head">Order Preference</h3>
                    <div class="container-fluid">
                        <form class="form-inline" action="cart" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="inlineFormControlInput1">Phone no</label><br>                               
                                <input class="form-control" type="tel"  id="inlineFormControlInput1" pattern="[6,7,8,9]{1}[0-9]{9}" >                                
                            </div>

                            <div class="form-group">
                                <label for="inlineFormControlInput2">Delivery Date</label><br>
                                <input class="form-control" type="date"  id="inlineFormControlInput2">
                            </div>
                            
                            <div class="form-group">
                                <div class="col-7">
                                    <label for="inlineFormControlInput3">Location</label><br>
                                    <input type="text" name="message" class="form-control location" id="inlineFormControlInput3" required>
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="confirm_order_btn">Confirm Order</button>
                            
                            
                        </form>
                    </div>
                </div>
       

    
       
    @endsection
</body>

