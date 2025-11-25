<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminManagementController extends Controller
{
    public function index(){
        $admins = Admin::paginate(5);

        return view('admin_management', compact('admins'));
    }
    public function store(Request $request){

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/admins', 'public');
        } else {
            $photoPath = null;
        }

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'telephone' => $request->telephone,
            'birth_date' => $request->birth_date,
            'cpf' => $request->cpf, 
            'photo' => $photoPath,
            'admin_id' => auth('admin')->id(),
        ]);

        return redirect()->route('admin_management');
    }
    public function update(Admin $admin, Request $request){
        $loggedInAdminId = auth('admin')->id();
        if ($loggedInAdminId !== $admin->id && $loggedInAdminId !== $admin->admin_id) {
            return redirect()->back()->withErrors(['error' => 'Você não tem permissão para editar este administrador.']);
        }

        $data = $request->except('photo');
        $admin->update($data);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/admins', 'public');
            $oldImage = $admin->photo;

            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            $admin->update([
                'photo' => $photoPath,
            ]);
        }

        return redirect()->route('admin_management');
    }

    public function destroy(Admin $admin){
        $loggedInAdminId = auth('admin')->id();
        if ($loggedInAdminId !== $admin->id && $loggedInAdminId !== $admin->admin_id) {
            return redirect()->back()->withErrors(['error' => 'Você não tem permissão para excluir este administrador.']);
        }

        $admin->delete(); 
        return redirect()->back();
    }
}
