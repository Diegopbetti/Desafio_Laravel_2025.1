<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualPageController extends Controller
{
    public function __invoke(){
        return view('individual_page');
    }
}
