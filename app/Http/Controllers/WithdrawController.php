<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function __invoke(){
        $user = Auth::user();
        $balance = $user->balance;

        return view('withdraw', compact('balance'));
    }

    public function withdraw(Request $request){
        $request->validate([
            'value' => 'required|numeric|min:0.01'
        ]);

        $user = Auth::user();
        $value = $request->input('value');

        if ($user->balance < $value) {
            return back()->withErrors(['value' => 'Saldo insuficiente.']);
        }

        $user->balance -= $value;
        $user->save();

        return redirect()->route('withdraw')->with('success', 'Saque realizado com sucesso!');
    }
}
