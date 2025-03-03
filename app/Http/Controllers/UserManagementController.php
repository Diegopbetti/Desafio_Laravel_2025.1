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

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string:min:8',
            'address' => 'required|string',
            'telephone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'cpf' => 'required|string|max:14',
            'balance' => 'required|numeric',
        ]);

        $user = User::find($id);
        $user->update($request->all);

        return redirect()->route('user_management');
    }
}
