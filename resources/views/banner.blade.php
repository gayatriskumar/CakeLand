@extends('master')

<head>
    <link rel="stylesheet" type="text/css" src="{{ asset('css/style.css') }}">
</head>

@section('content')

<h1>login page</h1>
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection