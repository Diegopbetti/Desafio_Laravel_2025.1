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
        // Obtém o usuário logado
        $user = Auth::user();

        // Retorna a view 'user_profile' com os dados do usuário
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
        // Obtém o usuário logado
        $user = Auth::user();

        // Valida os dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'cpf' => 'nullable|string|max:14',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Atualiza os dados do usuário
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->telephone = $request->telephone;
        $user->birth_date = $request->birth_date;
        $user->cpf = $request->cpf;

        // Atualiza a foto do usuário, se fornecida
        if ($request->hasFile('photo')) {
            // Exclui a foto antiga, se existir
            if ($user->photo && Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }

            // Armazena a nova foto
            $photoPath = $request->file('photo')->store('users/photos', 'public');
            $user->photo = $photoPath;
        }

        // Salva as alterações no banco de dados
        $user->save();

        // Redireciona de volta ao perfil com uma mensagem de sucesso
        return redirect()->route('user_profile')->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Exclui a conta do usuário logado.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        // Obtém o usuário logado
        $user = Auth::user();

        // Exclui a foto do usuário, se existir
        if ($user->photo && Storage::exists($user->photo)) {
            Storage::delete($user->photo);
        }

        // Exclui o usuário do banco de dados
        $user->delete();

        // Faz logout do usuário
        Auth::logout();

        // Redireciona para a página inicial com uma mensagem de sucesso
        return redirect()->route('home')->with('success', 'Sua conta foi excluída com sucesso.');
    }
}