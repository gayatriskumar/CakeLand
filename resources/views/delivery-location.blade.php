@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_deliverylocation.css') }}" rel="stylesheet">
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
    
            <h1 class="head_categories head_deliverylocation">Delivery Location</h1>
            <p class="delivery_msg">Give us your location. We shall find and deliver!</p>

            <div id="map"></div>
            
            <!-- Order details -->
            <div class="order_details">
                    <h3 class="preference_head">Order Preference</h3>
                    <div class="container-fluid">
                        <form class="form-inline" action="confirmorder" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="inlineFormControlInput1">Phone no</label><br>                               
                                <input class="form-control" name="del_phoneno" type="tel"  id="inlineFormControlInput1" pattern="[6,7,8,9]{1}[0-9]{9}" >                                
                            </div>

                            <div class="form-group">
                                <label for="inlineFormControlInput2">Delivery Date</label><br>
                                <input class="form-control" name='del_date' type="date"  id="inlineFormControlInput2">
                            </div>
                            
                            <div class="form-group">
                                <div class="col-7">
                                    <label for="inlineFormControlInput3">Location</label><br>
                                    <input type="text" name="del_location" class="form-control location" id="inlineFormControlInput3" required>
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="confirm_order_btn">Confirm Order</button>
                            
                            
                        </form>
                    </div>
                </div>
       

    
       
    @endsection
</body>

