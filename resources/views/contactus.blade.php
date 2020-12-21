@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_contact.css') }}" rel="stylesheet">
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
        <h1 class="head_categories">Contact</h1>

        <p class="info_contact">Get in touch with Cake Land to relish the most delicious in the world</p>
    
        <div class="contactinfo_box">
            Contact Information
                <div class="location_box">
                    <i class="fas fa-map-marker-alt icon_location_contact"></i>
                    <p class="data_contact">Cake Land <br> Aircool Building, KK Road.</p>
                </div>
                <div class="phoneno_box">
                    <i class="fas fa-phone icon_phoneno_contact"></i>
                    <p class="data_contact">+918086000081, +918086000083</p>
                </div>
                <div class="email_box">
                    <i class="fas fa-envelope icon_email_contact"></i>
                    <p class="data_contact">Info@cakeland.com</p>
                </div>
        </div>

        <div class="form_contact">
            <p class="formhead_contact">Send us a Message</p>
            <form class="form-contact" method="POST">
                @csrf
                            
                            <div class="form-group">                           
                                <input class="form-control" name='name' type="text"  id="inlineFormControlInput1" placeholder = "Name">                                
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" name='number' type="tel"  id="inlineFormControlInput2" placeholder = "Number">
                            </div>
                            
                            <div class="form-group">
                                <input type="email" name="email" class="form-control location" id="inlineFormControlInput3" placeholder = "Email" required>                               
                            </div>
                        
                            <div class="form-group">   
                                <textarea class="form-control" name='msg' rows="5" cols="50" id="inlineFormControlInput4" placeholder = "Message"></textarea>
                            </div>

                            <br>
                            <button type="submit" class="sendmsg_btn" data-toggle="modal" data-target="#exampleModalCenter">Send</button>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Message Recieved</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="map"></div>

    </div>

    @endsection
</body>

