<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class PurchaseHistoryController extends Controller
{
    public function __invoke(){
        $purchases = Transaction::where('buyer_id', auth()->id())->with('product')->get();

        return view('purchase_history', compact('purchases'));
    }
}
