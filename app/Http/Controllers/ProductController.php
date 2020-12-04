<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('add-product');
    }

    public function displaypopularcakes()
    {
        $data=Product::all();

        return view('popular-cakes', ['products'=>$data]);
    }
    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product'=>$data]);

    }

    public function search(Request $req)
    {
        $data= Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }
}
