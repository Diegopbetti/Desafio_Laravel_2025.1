<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __invoke(){
        $users = User::paginate(5);

        return view('user_management', compact('users'));
    }
}
