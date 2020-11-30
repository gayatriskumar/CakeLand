@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_sign_up.css') }}" rel="stylesheet">
@endpush


@section('content')
    <div class="signup_box">

        <h1 class="head_signup">Sign up</h1>

            <form method="POST">
            @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control signup_input" id="exampleInputName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control signup_input" id="exampleInputEmail1"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control signup_input" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="number" name="phoneno" class="form-control signup_input" id="exampleInputPhoneno" placeholder="Phoneno">
                </div>
                <div class="form-group">
                    <input type="textarea" name="address" class="form-control signup_input" id="exampleInputAddress" placeholder="Address">
                </div>
                <button type="submit" class="btn btn-primary signup_btn">Sign up</button>
            </form>
    </div>
    
    
@endsection
