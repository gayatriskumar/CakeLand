<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;

class ProductController extends Controller
{
    // Function to create a new item (admin)
    public function addProduct()
    {
        return view('add-product');
    }

    // Function to display popular cakes category (user)
    public function displaypopularcakes()
    {
        $data=Product::all();

        return view('popular-cakes', ['products'=>$data]);
    }
    
    // Function to display details of cakes (user)
    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product'=>$data]);

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
            $cart= new Cart;
    
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->save();

            $cartdetail= new CartDetail;

            $cartdetail->order_id =  $cart->user_id;
            $cartdetail->product_id = $req->product_id; 
            $cartdetail->quantity = $req->quantity;
            $cartdetail->weight = $req->weight;
            $cartdetail->message = $req->message;
            $cartdetail->baselayer = $req->baselayer;
            $cartdetail->save();    

            
            $cart->delivery_cost=100;
            $cart->total_cost=$req->price + $cart->delivery_cost;
            $orderDate=$cart->created_at;
            $cart->delivery_address=session()->get('user')['address'];
            $cart->save();





        }
        else
        {   

            return redirect ('/home');
        }
    }
}
