<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesHistoryController extends Controller
{
    public function __invoke(){
        return view('sales_history');
    }
}
