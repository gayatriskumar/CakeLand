@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_create_item_admin.css') }}" rel="stylesheet">
    
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
    <div class="categories_wrapper">
        <!-- heading -->
        <h1 class="head_categories">Edit Item</h1>
        <div class="create_item_wrapper">

            <form class="form_add_product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="img_upload">
                    <img src="{{ asset('images/admin/cakes')}}/{{ $product['image'] }}" alt="item_image" class="image_before">
                    <div class="dp_profile">
                    <div class="form-group">
                            <label for="file">Item Image</label>
                            <input type="file" name='file' class="choose_dp" onchange="previewFile(this)"/>
                            <img id='previewImg' class="dp_preview"/>
                        </div>
                </div>
                </div>



                <div class="form-group">
                    <label class="label_create_item" for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control add-product-input" id="exampleInputName" value="{{$product['name']}}">
                </div>

                <div class="form-group">
                    <label class="label_create_item" for="exampleFormControlSelect1">Category</label>
                    <select class="form-control add-product-input" name="category" id="exampleFormControlSelect1">
                        <option disabled="disabled" selected="selected">{{$category}}</option>
                        <option>Popular Cakes</option>
                        <option>Birthday Cakes</option>
                        <option>Anniversary Cakes</option>
                        <option>Special Cakes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label_create_item" for="exampleInputBrandName">Brand Name</label>
                    <input type="text" name="brand" class="form-control add-product-input" id="exampleInputBrandName" value="{{$product['brand']}}">
                </div>
                <div class="form-group">
                    <label class="label_create_item" for="exampleInputPrice">Price</label>
                    <input type="number" name="price" class="form-control add-product-input" id="exampleInputPrice" value="{{$product['price']}}">
                </div>
                <div class="form-group">
                    <label class="label_create_item" for="exampleInputRewardpoints">Reward Points</label>
                    <input type="number" name="reward_points" class="form-control add-product-input" id="exampleInputRewardpoints" value="{{$product['reward_point']}}">
                </div>
                <div class="form-group additive_input">
                    <label class="label_create_item" for="exampleInputAdditive">Additive</label>
                    <textarea type="number" name="description" class="form-control add-product-input" id="exampleInputAdditive" >{{$product['description']}}</textarea>
                </div>
                <a href="/edit-item/{{$product['id']}}"><button type="submit" class="submit-create-item">Save</button></a> 
            </form> 

        </div>
       

        
    </div>

    @endsection
</body>

