@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_contact.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
@endpush

<body>
    @section('content')
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Contact</h1>

        <p class="info_contact">Get in touch with Cake Land to relish the most delicious in the world</p>
    
        <div class="contactinfo_box">
            Contact Information
                <div class="location">
                    <i class="fas fa-map-marker-alt icon_contact"></i>
                    <p class="data_contact">Cake Land <br> Aircool Building, KK Road.</p>
                </div>
                <div class="phoneno_contact">
                    <i class="bi bi-phone"></i>
                    <p class="data_contact">+918086000081, +918086000083</p>
                </div>
                <div class="email_contact">
                    <i class="fa fa-envelope-o"></i>
                    <p class="data_contact">Info@cakeland.com</p>
                </div>
        </div>

    </div>

    @endsection
</body>

