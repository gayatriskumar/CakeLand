@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_categories_admin.css') }}" rel="stylesheet">
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
        <h1 class="head_categories">Popular cakes</h1>
        <a href="create_item_admin">
            <div class="add_item_admin">
            <img class="add_item_btn" src="{{ asset('images/admin/add.png') }}" alt="add_item"> Add Item
            </div>
        </a>
        

        <!-- cake box -->
        <div class='some-page-wrapper'>
            <div class="categories_list flex-container">
            <div class='row'>
                <div class='column'>
                        @foreach($products as $items)
                            <div class="box_categories flex-item">
                                <a class="atag" href="edit-item/{{$items->id}}">
                                    <div class="box_categories_image">
                                        <img class="image_categories" src="{{ asset('images/admin/cakes')}}/{{ $items->image }}">
                                    </div>

                                    <div class="ordernow_btn">
                                        <button class="ordernow_txt">Edit</button>
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
                                        <h5 class="description_price txt_forhover"><span class="rupee txt_forhover">₹</span>{{$items->price}}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        

    </div>

    @endsection
</body>

