<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Favorite;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Function to create a new item (admin)
    public function addProduct()
    {
        return view('add-product');
    }

    // Function to display popular cakes category (category_id=1) (user)
    public function displaypopularcakes()
    {
        $data=DB::table('products')
        ->where('products.category_id',1)
        ->select('products.*')
        ->get();

        return view('popular-cakes', ['products'=>$data]);
    }

     // Function to display birthday cakes category (category_id=2) (user)
     public function displaybirthdaycakes()
     {
        $data=DB::table('products')
        ->where('products.category_id',2)
        ->select('products.*')
        ->get();
 
         return view('birthday-cakes', ['products'=>$data]);
     }

    // Function to display anniversary cakes category (category_id=3) (user)
    public function displayanniversarycakes()
    {
       $data=DB::table('products')
       ->where('products.category_id',3)
       ->select('products.*')
       ->get();

        return view('anniversary-cakes', ['products'=>$data]);
    }

    // Function to display special cakes category (category_id=4) (user)
    public function displayspecialcakes()
    {
       $data=DB::table('products')
       ->where('products.category_id',4)
       ->select('products.*')
       ->get();

        return view('special-cakes', ['products'=>$data]);
    }
    

    // Function to display details of cakes (user)
    public function detail($id)
    {
        $data     = Product::find($id);
        if(session()->has('user'))
        {
            $user_id  = Session::get('user')['id'];
            
            $favorite = Favorite::where('user_id',$user_id)
                                ->where('product_id',$id)
                                ->pluck('id')
                                ->first();
            
            if($favorite)
            {
                $fav_flag = 1;
            }
            else 
            {
                $fav_flag = 0;
            }
        }
        else{
            $fav_flag = 2;
        }

        return view('detail', ['product'=>$data , 'fav_flag'=>$fav_flag]);

    }

    public function addToFavorites($id)
    {
        $user_id=Session::get('user')['id'];

        $fav = new Favorite;

        $fav -> user_id = $user_id;
        $fav -> product_id = $id;
        $fav->save();

        return redirect()->back();
    }

    public function removeFromFavorites($id)
    {
        $user_id=Session::get('user')['id'];

        $favId = DB::table('favorites')
                        ->where('user_id',$user_id)
                        ->where('product_id',$id)
                        ->pluck('id')
                        ->first();
                        
        Favorite::destroy($favId);
        return redirect()->back();

    }

    // Function to search for cakes in all categories (user)
    public function search(Request $req)
    {
        $data= Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }

    // Function to add a product to cart
    public function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {   
            
            $user_id =  Session::get('user')['id'];
            $cartId  =  DB::table('cart')
                        ->where('cart_status','=','0')
                        ->where('user_id',$user_id)
                        ->pluck('id')->first();
                
            

            if(isset($cartId))
            {

                    $cartdetail = new CartDetail;
    
                    $cartdetail->order_id = $cartId;
                    $cartdetail->product_id = $req->product_id; 
                    $cartdetail->quantity = $req->quantity;
                    $cartdetail->weight = $req->weight;
                    $cartdetail->message = $req->message;
                    $cartdetail->baselayer = $req->baselayer;
                    $cartdetail->save(); 
                    
                    $tot_cost  =  DB::table('cart')
                                    ->where('cart_status','=','0')
                                    ->where('user_id',$user_id)
                                    ->pluck('total_cost')->first();
                    
                    $qty       =  DB::table('cart')
                                    ->join('cartdetails','cart.id','=','cartdetails.order_id')
                                    ->join('products','cartdetails.product_id','=','products.id')
                                    ->where('user_id',$user_id)
                                    ->where('cart.user_id',$user_id)
                                    ->where('cartdetails.product_id',$req->product_id)
                                    ->pluck('cartdetails.quantity')
                                    ->first();
                                               
                    
                                    // echo "<pre>";
                                    // print_r($qty);
                                    // die();

                    Cart::where('cart_status','=','0')
                        ->where('user_id',$user_id)
                        ->update(['total_cost' => ($qty * $req->price) + $tot_cost]);

                    $qty_before =  DB::table('products')
                                ->where('id','=',$req->product_id)
                                ->pluck('qty_available')->first();
                    
                    // echo "<pre>";
                                    // print_r($qty_before);
                                    // die();
                    $qty_after =    DB::table('products')
                                    ->where('id','=',$req->product_id)
                                    ->update(['qty_available' => $qty_before - $qty]);

            }
            else
            {
                    $cart= new Cart;
                    $cart->user_id = $user_id;
                    $cart->save();
                    $cartId=$cart->id;

            
                    $cartdetail= new CartDetail;
    
                    $cartdetail->order_id =  $cartId;
                    $cartdetail->product_id = $req->product_id; 
                    $cartdetail->quantity = $req->quantity;
                    $cartdetail->weight = 5;
                    $cartdetail->message = $req->message;
                    $cartdetail->baselayer = $req->baselayer;
                    $cartdetail->save();   

                    $cart->total_cost = $req->quantity * $req->price;
    
                    $cart->save();

                    $qty       =  DB::table('cart')
                                    ->join('cartdetails','cart.id','=','cartdetails.order_id')
                                    ->join('products','cartdetails.product_id','=','products.id')
                                    ->where('user_id',$user_id)
                                    ->where('cart.user_id',$user_id)
                                    ->where('cartdetails.product_id',$req->product_id)
                                    ->pluck('cartdetails.quantity')
                                    ->first();

                    $qty_before =  DB::table('products')
                                    ->where('id','=',$req->product_id)
                                    ->pluck('qty_available')->first();

                    $qty_after =    DB::table('products')
                                    ->where('id','=',$req->product_id)
                                    ->update(['qty_available' => $qty_before - $qty]);

            }
            return redirect ('/cart');

        }
        else
        {   

            return redirect ('/home');
        }
    }


    // Function to get no of items in a cart
    static function cartItem()
    {
        if(session()->has('user'))
        {
            $user_id    =   Session::get('user')['id'];
            $cartId     =   DB::table('cart')
                            ->where('cart_status','=','0')
                            ->where('user_id',$user_id)
                            ->pluck('id')->first();
                            
            return Cartdetail::where('order_id',$cartId)->count();
        }
        else
        {
            return "";
        }
        
    }

    //Function to view items in the cart 
    public function viewCart()
    {   
        $user_id=Session::get('user')['id'];

        $products=DB::table('cart')
                    ->join('cartdetails','cart.id','=','cartdetails.order_id')
                    ->join('products','cartdetails.product_id','=','products.id')
                    ->where('cart.user_id',$user_id)
                    ->where('cart.cart_status','=','0')
                    ->select('products.*','cartdetails.id as cart_id','cart.total_cost as total_cost')
                    ->get()
                    ->toArray();
        // echo "<pre>";
        // print_r($products);

        return view('cart',['products'=>$products]);
    }

    public function removeCart($id)
    {
        $no_of_items     = ProductController::cartItem();
        $user_id         = Session::get('user')['id'];

        $cost_of_removed = DB::table('cartdetails')
                                ->join('products','cartdetails.product_id','=','products.id')
                                ->where('products.id',$id)
                                ->pluck('price')->first(); 

        $tot_cost        =  DB::table('cart')
                                ->where('cart_status','=','0')
                                ->where('user_id',$user_id)
                                ->pluck('total_cost')->first();

        $qty             =  DB::table('cart')
                                ->join('cartdetails','cart.id','=','cartdetails.order_id')
                                ->join('products','cartdetails.product_id','=','products.id')
                                ->where('user_id',$user_id)
                                ->where('cart.user_id',$user_id)
                                ->where('cartdetails.product_id',$id)
                                ->pluck('cartdetails.quantity')
                                ->first();

        // echo "<pre>";
        // print_r($cost_of_removed);
        // die();

        Cart::where('cart_status','=','0')
                ->where('user_id',$user_id)
                ->update(['total_cost' => $tot_cost - ($qty * $cost_of_removed)]);
       
        $cartdetailId   = DB::table('cart')
                            ->join('cartdetails','cart.id','=','cartdetails.order_id')
                            ->join('products','cartdetails.product_id','=','products.id')
                            ->where('cart.user_id',$user_id)
                            ->where('cartdetails.product_id',$id)
                            ->pluck('cartdetails.id')
                            ->first();

        if($no_of_items == 1)
        {       
            Cartdetail::destroy($cartdetailId);

            $cartId         =  DB::table('cart')
                            ->where('cart_status','=','0')
                            ->where('user_id',$user_id)
                            ->pluck('id')->first();

            Cart::destroy($cartId);
        }
        else
        {
            Cartdetail::destroy($cartdetailId);
        }

        $qty_before =  DB::table('products')
                            ->where('id','=',$id)
                            ->pluck('qty_available')->first();

        $qty_after =    DB::table('products')
                            ->where('id','=',$id)
                            ->update(['qty_available' => $qty_before + $qty]);
        
        return redirect('cart');
    }


    //Function for checkout

    public function checkout(Request $req)
    {
        return view('delivery-location');
    }

    public function confirmOrder(Request $req)
    {
        $user_id         =  Session::get('user')['id'];
        $cartId          =  DB::table('cart')
                                ->where('cart_status','=','0')
                                ->where('user_id',$user_id)
                                ->pluck('id')->first();


        $cart = DB::table('cart')
                ->where('cart_status','=','0')
                ->where('user_id',$user_id)
                ->update([
                    'cart_status'        =>   1,
                    'delivery_phoneno'   =>   $req->del_phoneno,
                    'delivery_address'   =>   $req->del_location,
                    'delivery_date'      =>   $req->del_date
                ]);

        // echo "<pre>";
        // print_r($qty);
        // die();

        return redirect('profile');

    }
}