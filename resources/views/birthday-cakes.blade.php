@extends('layout')


@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <script href="{{ asset('js/categories.js') }}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<body>
    @section('content')
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Birthday cakes</h1>
        <div class="form-group has-search categories_search">
            <span class="fa fa-search form-control-feedback categories_searchicon"></span>
            <input type="text" class="form-control" placeholder="Search by name">
        </div>

        <!-- cake box -->
        <div class="categories_list">
            @foreach($products as $items)
                <div class="box_categories">
                    <a class="atag" href="detail/{{$items->id}}">
                        <div class="box_categories_image">
                            <img class="image_categories" src="{{$items->image}}">
                        </div>

                        <div class="ordernow_btn">
                            <button class="ordernow_txt">Order Now</button>
                        </div>
                        <div class="box_categories_details">
                            <div class="name_categories txt_forhover">{{$items->name}}</div>
                            <div class="favorite_categories">
                                <img src="{{ asset('images/categories/fav.png') }}" alt="star_gold">
                            </div>
                            <div class="box_categories_rating">
                                @for ($i = 0; $i < $items->rating; $i++)
                                    <div class="star">
                                        <img src="{{ asset('images/categories/star_gold.png') }}" alt="star_gold">
                                    </div>
                                @endfor
                                @for ($i = 0; $i < 5-$items->rating; $i++)
                                    <div class="star">
                                        <img src="{{ asset('images/categories/gray_star.png') }}" alt="star_grey">
                                    </div>
                                @endfor
                            </div>
                            <div class="box_categories_availability">
                                @if ($items->qty_available >= 1)
                                    Availability: <span class="available">In Stock</span>
                                @else
                                    Availability: <span class="not_available">Out of Stock</span>
                                @endif
                            </div>
                            <h5 class="description_categories txt_forhover">{{$items->description}}</h5>
                            <h5 class="description_price txt_forhover"><span class="rupee txt_forhover">₹</span>{{$items->price}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        

    </div>

    @endsection
</body>
