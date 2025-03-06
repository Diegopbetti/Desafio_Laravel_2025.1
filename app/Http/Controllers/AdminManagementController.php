<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    public function index(){
        $admins = Admin::paginate(5);

        return view('admin_management', compact('admins'));
    }
}
