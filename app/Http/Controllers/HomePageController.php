<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request){
        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $products = $query->paginate(9);

        $categories = Product::select('category')->distinct()->pluck('category');


        return view('home_page', compact('products', 'categories'));
    }
}
