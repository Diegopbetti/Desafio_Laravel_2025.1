<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    if (auth('web')->attempt($request->only(['email', 'password']))) {
        return redirect()->route('home_page');
    }
    else if (auth('admin')->attempt($request->only(['email', 'password']))) {
        return redirect()->route('dashboard');
    }
    return back()->withErrors("Credenciais incorretas");
}

    /**
     * Destroy an authenticated session.
     */
        public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
