@extends('layout-admin')

@push('styles')
    <link href="{{ asset('css/styles_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_categories_admin.css') }}" rel="stylesheet">
@endpush

@push('scripts')

@endpush

<body>
    @section('content')
    
    <h1 class="head_categories">Categories</h1>

    <div class="wrapper_A_categories">

        <div class="outer_box">
            <div class="categories_box">
                <div class="category_name">Popular Cakes</div>
                <a class="category_edit_btn" href="popular-cakes-admin"><img class="edit_icon" src="https://img.icons8.com/metro/26/ffffff/edit.png"/>Edit Category</a>
                    <button class="category_delete_btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> 
                        <img class="delete_icon" src="{{ asset('images/admin/deleteicon.png') }}" alt="delete_icon"> 
                        Delete Category
                    </button>
                
                    <!-- <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete the 'Popular Cakes' category ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close_btn_modal" data-dismiss="modal">Close</button>
                           <a href="delete-category/1"><button type="button" class="btn delete_btn_modal">Delete</button></a> 
                        </div>
                        </div>
                    </div>
                    </div> -->
            </div>
        </div>
            
        <div class="outer_box">
            <div class="categories_box">
                <div class="category_name">Birthday Cakes</div>
                <a class="category_edit_btn" href="birthday-cakes-admin"><img class="edit_icon" src="https://img.icons8.com/metro/26/ffffff/edit.png"/>Edit Category</a>
                <button class="category_delete_btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> 
                    <img class="delete_icon" src="{{ asset('images/admin/deleteicon.png') }}" alt="delete_icon"> 
                    Delete Category
                </button>
                <!-- <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete the 'Birthday Cakes' category ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close_btn_modal" data-dismiss="modal">Close</button>
                           <a href="delete-category/2"><button type="button" class="btn delete_btn_modal">Delete</button></a> 
                        </div>
                        </div>
                    </div>
                    </div> -->
            </div>
        </div>
        
        <div class="outer_box">
            <div class="categories_box">
                <div class="category_name">Anniversary Cakes</div>
                <a class="category_edit_btn" href="anniversary-cakes-admin"><img class="edit_icon" src="https://img.icons8.com/metro/26/ffffff/edit.png"/>Edit Category</a>
                <button class="category_delete_btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> 
                    <img class="delete_icon" src="{{ asset('images/admin/deleteicon.png') }}" alt="delete_icon"> 
                    Delete Category
                </button>
                <!-- <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete the 'Anniversary Cakes' category ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close_btn_modal" data-dismiss="modal">Close</button>
                           <a href="delete-category/3"><button type="button" class="btn delete_btn_modal">Delete</button></a> 
                        </div>
                        </div>
                    </div>
                    </div> -->
            </div>
        </div>

        <div class="outer_box">
            <div class="categories_box">
                <div class="category_name">Special Cakes</div>
                <a class="category_edit_btn" href="special-cakes-admin"><img class="edit_icon" src="https://img.icons8.com/metro/26/ffffff/edit.png"/>Edit Category</a>
                <button class="category_delete_btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> 
                    <img class="delete_icon" src="{{ asset('images/admin/deleteicon.png') }}" alt="delete_icon"> 
                    Delete Category
                </button>
                <!-- <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete the 'Special Cakes' category ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close_btn_modal" data-dismiss="modal">Close</button>
                           <a href="delete-category/4"><button type="button" class="btn delete_btn_modal">Delete</button></a> 
                        </div>
                        </div>
                    </div>
                    </div> -->
            </div>
        </div>
        
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           Are you sure you want to delete the entire category ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close_btn_modal" data-dismiss="modal">Close</button>
            <button type="button" class="btn delete_btn_modal">Delete</button>
        </div>
        </div>
    </div>
    </div>
       
    @endsection
</body>

