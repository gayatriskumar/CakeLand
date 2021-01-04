@extends('layout-admin')

<head>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" type="text/css" src="{{ asset('css/style.css') }}">
</head>

<body class="body_banner">
    @section('content')

    <div class="main_content">
            <div class="head">Cakes are special.</div>  
            <div class="head2">Every birthday, every celebration ends with something sweet, a cake, and people remember.</div>
            <form action="/search" class="form-group has-search">
                <span class="fa fa-search form-control-feedback search_icon" style="top:575px;"></span>
                <input type="text" name="query" class="form-control" placeholder="Search by name">
            </form>
        </div>
                
    @endsection
</body>
