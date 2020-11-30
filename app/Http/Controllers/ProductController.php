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

    public function displaycategories()
    {
        $data=Product::all();

        return view('categories', ['products'=>$data]);
    }
}
