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
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,',
            'password' => 'required|string|min:8',
            'address' => 'required|string',
            'telephone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'cpf' => 'required|string|max:14',
            'photo' => 'required|image',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->address = $request->address;
        $admin->telephone = $request->telephone;
        $admin->birth_date = $request->birth_date;
        $admin->cpf = $request->cpf; 

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/admins', 'public');
            $admin->photo = $photoPath;
        }

        $admin->save();

        return redirect()->route('admin_management');
    }
    public function update(Request $request, $id){
        if (auth()->id() !== (int) $id) {
            return redirect()->back()->withErrors([
                'error' => 'Você não pode editar a conta de outro administrador.'
            ]);
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'required|string|min:8',
            'address' => 'required|string',
            'telephone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'cpf' => 'required|string|max:14',
            'photo' => 'required|image',
        ]);

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->address = $request->address;
        $admin->telephone = $request->telephone;
        $admin->birth_date = $request->birth_date;
        $admin->cpf = $request->cpf; 

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/admins', 'public');
            $admin->photo = $photoPath;
        }
        $admin->save();

        return redirect()->route('admin_management');
    }

    public function destroy($id){
        
        if (auth()->id() !== (int) $id) {
            return redirect()->back()->withErrors([
                'error' => 'Você não pode excluir a conta de outro administrador.'
            ]);
        }
        
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin_management');
    }
}
