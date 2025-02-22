<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    public function __invoke(){
        return view('purchase_history');
    }
}
