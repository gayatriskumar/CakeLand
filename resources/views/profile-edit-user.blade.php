@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_profile_edit_user.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function previewFile(input)
        {
            var file=$('input[type=file]').get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush

<body>
    @section('content')

    <h1 class="head_categories">Edit Profile</h1>

    <div class="upper_wrapper">

        <div class="email_box">
            <!-- <i class="fas fa-envelope icon_profile"></i> -->
            <div class="box_head">Email ID:</div>
            <div class="user_data">{{$user['email']}}</div>
        </div>

        <form class="form-inline" method="POST" action="{{route('user.save')}}" enctype="multipart/form-data">
            @csrf
                <div class="img_box">
                    <div class="dp_profile">
                        <div class="form-group">
                            <label for="file">Choose Profile Image</label>
                            <input type="file" name='file' id="file" class="choose_dp inputfile" onchange="previewFile(this)"/>
                            <img id='previewImg' class="dp_preview"/> 
                        </div>
                    </div>
                    <div class="user_name">{{$user['name']}}</div>
                </div>


                <div class="form-group">
                    <div class="location_box">
                        <!-- <i class="fas fa-map-marker-alt icon_profile"></i> -->
                        <div class="box_head">Location</div>
                        <textarea class="form-control" name='location_user_edit' type="text" style="height: 85px" rows="5" cols="50" id="inlineFormControlInput1">{{$user['address']}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="Phoneno_box">
                        <!-- <i class="fa fa-phone icon_profile"></i> -->
                        <div class="box_head">Phone no</div>
                        <input class="form-control" name='phoneno_user_edit' type="text"  id="inlineFormControlInput1" value='{{$user['phoneno']}}'>
                    </div>
                </div>

                <div class="form-group">
                    <div class="Admin_box">
                        <div class="box_head">Would you like to sell cakes</div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="saveprofile_btn">Save</button>

                <!-- @if(Session::has('user_updated'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('user_updated')}}
                    </div>
                @endif -->

                <!-- @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif -->

                @if (session()->has('success'))
                    <h1>IT WORKS!</h1>
                @endif

        </form>

    </div>


       
    @endsection
</body>

