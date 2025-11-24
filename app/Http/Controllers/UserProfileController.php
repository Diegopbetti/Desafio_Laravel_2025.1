<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Exibe o perfil do usuário logado.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();

        return view('user_profile', compact('user'));
    }

    /**
     * Atualiza as informações do usuário logado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'cpf' => 'nullable|string|max:14',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->birth_date = $request->birth_date;
        $user->cpf = $request->cpf;

        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }

            $photoPath = $request->file('photo')->store('users/photos', 'public');
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('user_profile')->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Exclui a conta do usuário logado.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $oldImage = $user->photo;

        if ($oldImage && Storage::disk('public')->exists($oldImage)) {
            Storage::disk('public')->delete($oldImage);
        }

        $user->delete();

        return redirect()->route('home');
    }
}