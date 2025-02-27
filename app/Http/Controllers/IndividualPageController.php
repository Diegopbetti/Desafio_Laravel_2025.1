<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndividualPageController extends Controller
{
    public function show($id){
        $product = Product::with('announcer')->find($id);

        return view('individual_page', compact('product'));
    }
}
