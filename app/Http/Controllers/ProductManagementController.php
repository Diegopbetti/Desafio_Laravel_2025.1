<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index(){
        $products = Product::with('announcer')->paginate(5);

        return view('product_management', compact('products'));
    }
}
