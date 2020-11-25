@extends('banner')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

@section('login')

<div class="login_box">
    <form action='login' method="POST">
        <div class="form-group">
            @csrf
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
        </div><br>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection


