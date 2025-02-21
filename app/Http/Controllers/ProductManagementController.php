<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function __invoke(){
        return view('product_management');
    }
}
