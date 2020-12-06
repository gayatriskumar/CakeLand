@extends('layout')

@push('styles')
    <link href="{{ asset('css/styles_add_product.css') }}" rel="stylesheet">
@endpush

<body>
    @section('content')
        <div class="create_item_box">
            <h1 class="head_create_item">Create item</h1>

            <form class="form_add_product">
                <div class="form-group">
                    <label class="label_create_item" for="exampleInputName">Name</label>
                    <input type="text" class="form-control add-product-input" id="exampleInputName">
                </div>
                <div class="form-group">
                    <label class="label_create_item" for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option disabled="disabled" selected="selected">--Select--</option>
                        <option>Popular Cakes</option>
                        <option>Birthday Cakes</option>
                        <option>Anniversary Cakes</option>
                        <option>Special Cakes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label_create_item" for="exampleInputBrandName">Brand Name</label>
                    <input type="text" class="form-control add-product-input" id="exampleInputBrandName">
                </div>
                <div class="form-group">
                    <label class="label_create_item" for="exampleInputPrice">Price</label>
                    <input type="number" class="form-control add-product-input" id="exampleInputPrice">
                </div>
                <button type="submit" class="btn btn-primary submit-create-item">Submit</button>
            </form> 
        </div>
    @endsection
</body>
