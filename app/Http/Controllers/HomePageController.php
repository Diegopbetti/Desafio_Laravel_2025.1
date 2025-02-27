<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __invoke(){
        $products = Product::paginate(9);

        return view('home_page', compact('products'));
    }
}
