@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_profile_admin.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
        <h1 class="head_categories">Profile</h1>

        <div class="name_box">
            <div><img class="dp_admin" src="{{ asset('images/dp')}}/{{ $user->profile_photo }}"></div>
            <div class="name_admin">{{$user->name}}</div>
            <a href="profile-edit-admin"><div class="edit_button"><img class='edit_icon' src="{{ asset('images/admin/edit-icon-grey.png')}}" alt="edit_icon"></div></a> 
        </div>

        <div class="contactinfo_box">
            Details
                <div class="phoneno_box">
                    <i class="fas fa-phone icon_phoneno_contact"></i>
                    <p class="data_contact phoneno_admin">{{$user->phoneno}}</p>
                </div>
                <div class="email_box">
                    <i class="fas fa-envelope icon_email_contact"></i>
                    <p class="data_contact">{{$user->email}}</p>
                </div>
                <div class="location_box">
                    <i class="fas fa-map-marker-alt icon_location_contact"></i>
                    <p class="data_contact">{{$user->address}}</p>
                </div>
        </div>

        <div id="map"></div>

    </div>

    @endsection
</body>

