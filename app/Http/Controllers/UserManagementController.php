<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(){
        $users = User::paginate(5);

        return view('user_management', compact('users'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string|min:8',
            'address' => 'required|string',
            'telephone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'cpf' => 'required|string|max:14',
            'balance' => 'required|numeric',
            'photo' => 'nullable|image',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->birth_date = $request->birth_date;
        $user->cpf = $request->cpf; 
        $user->balance = $request->balance;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/users', 'public');
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('user_management');
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
            'photo' => 'nullable|image',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->birth_date = $request->birth_date;
        $user->cpf = $request->cpf; 
        $user->balance = $request->balance;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/users', 'public');
            $user->photo = $photoPath;
        }
        $user->save();

        return redirect()->route('user_management');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user_management');
    }
}
