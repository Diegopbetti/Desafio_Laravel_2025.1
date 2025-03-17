<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResources;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const ITENS_PER_PAGE = 6;

    public function showUser(){
        $page = $_GET['page'];
        $skip = ($page-1) * UserController::ITENS_PER_PAGE;
        $total_pages = ceil(User::count()/UserController::ITENS_PER_PAGE);

        $users = UserResources::collection(User::get()->skip($skip)->take(UserController::ITENS_PER_PAGE));

        if($users){
            return response()->json([
                'users' => $users,
                'total_pages' => $total_pages,
                'status' => 200
            ]);
        }
    }
}
