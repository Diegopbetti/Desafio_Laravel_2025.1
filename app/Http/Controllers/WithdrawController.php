<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function __invoke(){
        return view('withdraw');
    }
}
