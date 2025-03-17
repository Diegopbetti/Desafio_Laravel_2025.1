<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Resources\AdminResources;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    const ITENS_PER_PAGE = 6;

    public function showAdmin(){
        $page = $_GET['page'];
        $skip = ($page-1) * AdminController::ITENS_PER_PAGE;
        $total_pages = ceil(Admin::count()/AdminController::ITENS_PER_PAGE);

        $admins = AdminResources::collection(Admin::get()->skip($skip)->take(AdminController::ITENS_PER_PAGE));

        if($admins){
            return response()->json([
                'admins' => $admins,
                'total_pages' => $total_pages,
                'status' => 200
            ]);
        }
    }
}
