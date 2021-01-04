<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\DeliveryStaff;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('layout-admin');
    }

    public function viewCategories()
    {
        return view('categories-admin');
    }

    //Functions to display various categories

    //Popular cakes

    public function displayPopularcakesAdmin() 
    {
        $data=DB::table('products')
        ->where('products.category_id',1)
        ->select('products.*')
        ->get();

        return view('popular-cakes-admin', ['products'=>$data]);
        
    }
    public function deletePopularcakesAdmin()
    {
        $items_in_category = Product::where('category_id','=',1);
        echo "<pre>";
        print_r($items_in_category);
        die();
    }

    //Anniversary cakes
    public function displayAnniversarycakesAdmin()
    {
        $data=DB::table('products')
       ->where('products.category_id',3)
       ->select('products.*')
       ->get();

        return view('anniversary-cakes-admin', ['products'=>$data]);
    }

    //Birthday cakes
    public function displayBirthdaycakesAdmin()
    {
        $data=DB::table('products')
        ->where('products.category_id',2)
        ->select('products.*')
        ->get();
 
        return view('birthday-cakes-admin', ['products'=>$data]);
    }


    //Special cakes
    public function displaySpecialcakesAdmin()
    {
        $data=DB::table('products')
       ->where('products.category_id',4)
       ->select('products.*')
       ->get();

        return view('special-cakes-admin', ['products'=>$data]);
    }


    //Create Item by Admin

    //View the Create item page
    public function viewCreateItemAdmin()
    {
        return view('create-item-admin');
    }

    //Add an item to db
    public function createItemAdmin(Request $req)
    {
        $item = new Product;

        $image = $req->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/admin/cakes'),$imageName);

        $category = $req->category;
        if($category == 'Popular Cakes')
        {
            $category_id = 1;
        }
        elseif($category == 'Birthday Cakes')
        {
            $category_id = 2;
        }
        elseif($category == 'Anniversary Cakes')
        {
            $category_id = 3;
        }
        else
        {
            $category_id = 4;
        }

            // echo "<pre>";
            // print_r($category_id);
            // die();
        

        $item->name          =   $req->name;
        $item->brand         =   $req->brand;
        $item->price         =   $req->price;
        $item->description   =   $req->description;
        $item->image         =   $imageName;
        $item->reward_point  =   $req->reward_points;
        $item->category_id   =   $category_id;


        $item->rating        = 5;
        $item->qty_available = 10;

        $item->save();

        // echo "<pre>";
        // print_r($item);
        // die();
        if($category == 'Popular Cakes')
        {
            return redirect('/popular-cakes-admin');
        }
        elseif($category == 'Birthday Cakes')
        {
            return redirect('/birthday-cakes-admin');
        }
        elseif($category == 'Anniversary Cakes')
        {
            return redirect('/anniversary-cakes-admin');
        }
        else
        {
            return redirect('/special-cakes-admin');
        }

        // return view('categories-admin');

    } 

    public function viewEditItem($id) 
    {
        $data = Product::find($id);
        $category_id = $data->category_id;

        if($category_id == 1)
        {
            $category = 'Popular Cakes';
        }
        elseif($category_id == 2)
        {            
            $category = 'Birthday Cakes';
        }
        elseif($category_id == 3)
        {            
            $category = 'Anniversary Cakes';
        }
        else
        {
            $category = 'Special Cakes';
        }

        return view('edit-item-admin', ['product'=>$data , 'category'=>$category]);
    }

    public function updateItemAdmin($id, Request $req)
    {
        $category = $req->category;
        if($category == 'Popular Cakes')
        {
            $category_id = 1;
        }
        elseif($category == 'Birthday Cakes')
        {
            $category_id = 2;
        }
        elseif($category == 'Anniversary Cakes')
        {
            $category_id = 3;
        }
        else
        {
            $category_id = 4;
        }

        // echo "<pre>";
        // print_r($category);
        // die();

        Product::where('id',$id)
                ->update([  
                    'name'               =>   $req->name,
                    'brand'              =>   $req->brand,
                    'price'              =>   $req->price,
                    'description'        =>   $req->description,
                    'reward_point'       =>   $req->reward_points,
                    'category_id'        =>   $category_id
                ]);
                
        
        if($category == 'Popular Cakes')
        {
            return redirect('/popular-cakes-admin');
        }
        elseif($category == 'Birthday Cakes')
        {
            return redirect('/birthday-cakes-admin');
        }
        elseif($category == 'Anniversary Cakes')
        {
            return redirect('/anniversary-cakes-admin');
        }
        else
        {
            return redirect('/special-cakes-admin');
        }
    }


    public function viewInboxAdmin()
    {
       
        $order       = DB::table('cart')
                            ->join('users','cart.user_id','=','users.id')
                            ->where('cart.cart_status',1)
                            ->orwhere('cart.cart_status',2)
                            ->orwhere('cart.cart_status',3)
                            ->orwhere('cart.cart_status',4)
                            ->select(
                                     'cart.id as id',
                                     'cart.cart_status as status',
                                     'users.name as user_name', 
                                     'cart.delivery_address as user_place', 
                                     'cart.created_at as user_time',
                                     'users.profile_photo as user_image'
                                     )
                            ->get();
        
        return view('inbox-admin', ['order'=>$order]);
    }

    public function orderAdmin($id)
    {
        // $user   = DB::table('users')
        //             ->join('cart','users.id','=','cart.user_id')
        //             ->join('cartdetails','cart.id','=','cartdetails.order_id')
        //             ->where('cart.cart_status',1)
        //             ->orwhere('cart.cart_status',2)
        //             ->orwhere('cart.cart_status',4)
        //             ->orwhere('cart.cart_status',3)
        //             ->where('cart.id',$id)
        //             ->select(
        //                 'users.name as user_name', 
        //                 'users.profile_photo as user_image',
        //                 'cart.delivery_address as user_place', 
        //                 'cart.delivery_phoneno as user_phoneno',
        //                 'cart.created_at as user_time'
        //                 )
        //             ->get()
        //             ->first();
        
        $cart_status  = Cart::where('cart.id',$id)
                        ->pluck('cart_status')
                        ->first();
        
        if($cart_status == 1)
        {
            $user   = DB::table('users')
                        ->join('cart','users.id','=','cart.user_id')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->where('cart.cart_status',1)
                        ->where('cart.id',$id)
                        ->select(
                            'users.name as user_name', 
                            'users.profile_photo as user_image',
                            'cart.delivery_address as user_place', 
                            'cart.delivery_phoneno as user_phoneno',
                            'cart.created_at as user_time'
                            )
                        ->get()
                        ->first();

            $order       =  DB::table('cart')
                            ->join('cartdetails','cart.id','=','cartdetails.order_id')
                            ->join('users','cart.user_id','=','users.id')
                            ->join('products','cartdetails.product_id','=','products.id')
                            ->where('cartdetails.order_id',$id)
                            ->where('cart.cart_status',1)
                            ->select(
                                    'cart.id as id',
                                    'cartdetails.created_at as prod_time',
                                    'products.name as prod_name',
                                    'products.rating as prod_rating',
                                    'cartdetails.quantity as prod_quantity',
                                    'cartdetails.weight as prod_weight',
                                    'cartdetails.baselayer as prod_baselayer',
                                    'cartdetails.message as prod_message'
                                    )
                            ->get();
        }
        elseif($cart_status == 2)
        {
            $user   = DB::table('users')
                            ->join('cart','users.id','=','cart.user_id')
                            ->join('cartdetails','cart.id','=','cartdetails.order_id')
                            ->where('cart.cart_status',2)
                            ->where('cart.id',$id)
                            ->select(
                                'users.name as user_name', 
                                'users.profile_photo as user_image',
                                'cart.delivery_address as user_place', 
                                'cart.delivery_phoneno as user_phoneno',
                                'cart.created_at as user_time'
                                )
                            ->get()
                            ->first();

            $order       =  DB::table('cart')
                            ->join('cartdetails','cart.id','=','cartdetails.order_id')
                            ->join('users','cart.user_id','=','users.id')
                            ->join('products','cartdetails.product_id','=','products.id')
                            ->where('cartdetails.order_id',$id)
                            ->where('cart.cart_status',2)
                            ->select(
                                    'cart.id as id',
                                    'cartdetails.created_at as prod_time',
                                    'products.name as prod_name',
                                    'products.rating as prod_rating',
                                    'cartdetails.quantity as prod_quantity',
                                    'cartdetails.weight as prod_weight',
                                    'cartdetails.baselayer as prod_baselayer',
                                    'cartdetails.message as prod_message'
                                    )
                            ->get();
        }
        elseif($cart_status == 3)
        {
            $user   = DB::table('users')
                        ->join('cart','users.id','=','cart.user_id')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->where('cart.cart_status',3)
                        ->where('cart.id',$id)
                        ->select(
                            'users.name as user_name', 
                            'users.profile_photo as user_image',
                            'cart.delivery_address as user_place', 
                            'cart.delivery_phoneno as user_phoneno',
                            'cart.created_at as user_time'
                            )
                        ->get()
                        ->first();

            $order       =  DB::table('cart')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->join('users','cart.user_id','=','users.id')
                        ->join('products','cartdetails.product_id','=','products.id')
                        ->where('cartdetails.order_id',$id)
                        ->where('cart.cart_status',3)
                        ->select(
                                'cart.id as id',
                                'cartdetails.created_at as prod_time',
                                'products.name as prod_name',
                                'products.rating as prod_rating',
                                'cartdetails.quantity as prod_quantity',
                                'cartdetails.weight as prod_weight',
                                'cartdetails.baselayer as prod_baselayer',
                                'cartdetails.message as prod_message'
                                )
                        ->get();   
        }
        else
        {
            $user   = DB::table('users')
                        ->join('cart','users.id','=','cart.user_id')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->where('cart.cart_status',4)
                        ->where('cart.id',$id)
                        ->select(
                            'users.name as user_name', 
                            'users.profile_photo as user_image',
                            'cart.delivery_address as user_place', 
                            'cart.delivery_phoneno as user_phoneno',
                            'cart.created_at as user_time'
                            )
                        ->get()
                        ->first();

            $order       =  DB::table('cart')
                        ->join('cartdetails','cart.id','=','cartdetails.order_id')
                        ->join('users','cart.user_id','=','users.id')
                        ->join('products','cartdetails.product_id','=','products.id')
                        ->where('cartdetails.order_id',$id)
                        ->where('cart.cart_status',4)
                        ->select(
                                'cart.id as id',
                                'cartdetails.created_at as prod_time',
                                'products.name as prod_name',
                                'products.rating as prod_rating',
                                'cartdetails.quantity as prod_quantity',
                                'cartdetails.weight as prod_weight',
                                'cartdetails.baselayer as prod_baselayer',
                                'cartdetails.message as prod_message'
                                )
                        ->get();   
        }
 
        $order_status = Cart::where('id','=',$id)
                            ->pluck('cart_status')
                            ->first();

        // echo "<pre>";
        // print_r($user);
        // die();
        return view('order-admin',['user'=>$user , 'order'=>$order , 'order_status'=>$order_status , 'cart_id'=>$id]);
    }

    public function viewDeliveryStaffAdmin($id)
    {
        $del_staff = DB::table('delivery_staff')
                        ->select('delivery_staff.id as ds_id',
                                'delivery_staff.name as ds_name',
                                'delivery_staff.profile_photo as ds_dp',
                                'delivery_staff.status as ds_status')
                        ->get();

        Cart::where('id', $id)
            ->update(['cart_status' => 3]);

        return view('delivery-staff-admin',['del_staff'=>$del_staff]);
    }
    
    public function processOrderAdmin(Request $req)
    {
        $id =   $req->cart_id;
        Cart::where('id', $id)
            ->update(['cart_status' => 2]);

        return redirect('/inbox-admin');
    }

    public function assignOrderAdmin(Request $req)
    {
        $delivery_agent_id = $req->agent_id;

        // echo "<pre>";
        // print_r($req->cart_id);
        // die();

        DeliveryStaff::where('id',$req->agent_id)
                ->update(['status'       =>   1]);
        
        return redirect('/inbox-admin');

    }

    public function viewProfileAdmin()
    {
        $user_id = Session::get('user')['id'];
        $user = User::where(['id'=>$user_id])->first();

        return view('profile-admin',['user'=>$user]);

    }

    public function EditProfileAdmin(Request $req)
    {
        $user_id = Session::get('user')['id'];
        $user = User::where(['id'=>$user_id])->first();

        return view('profile-edit-admin',['user'=>$user]);
    }

    public function SaveProfileAdmin(Request $req)
    {
        $user_id  =  Session::get('user')['id'];

        $user_dp = User::where('id','=',$user_id)
                        ->pluck('profile_photo')
                        ->first();
        
        // echo "<pre>";
        // print_r($req->file('file'));
        // die();

        if($req->file('file'))
        {
            $image = $req->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/dp'),$imageName);

            User::where('id',$user_id)
                    ->update([
                        'address'       =>   $req->location_user_edit,
                        'profile_photo' =>   $imageName,
                        'phoneno'       =>   $req->phoneno_user_edit
                    ]);
        }
        else
        {
            User::where('id',$user_id)
                ->update([
                    'address'       =>   $req->location_user_edit,
                    'phoneno'       =>   $req->phoneno_user_edit
                ]);
        }

        return redirect('/profile-admin');
    }
}
