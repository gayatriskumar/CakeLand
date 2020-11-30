@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
@endpush

<body>
    @section('content')
        <h1 class="head_categories">Popular cakes</h1>

        @foreach($products as $items)
            <div class="box_categories">
                <img class="image_categories" src="{{$items['image']}}">
                <h3 class="name_categories">{{$items['name']}}</h3>
                <h5 class="description_categories">{{$items['description']}}</h5>
                <h5 class="description_price">{{$items['price']}}</h5>
            </div>
        @endforeach
         
        <!-- @foreach ($products as $items)
            <p>{{ $items->name }}</p>
        @endforeach -->

    @endsection
</body>