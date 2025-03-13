<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class SalesHistoryController extends Controller
{
    public function __invoke()
    {
        $sales = Transaction::where('seller_id', auth()->id())->with('product')->get();

        return view('sales_history', compact('sales'));
    }
}
