<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Exibe a view de contato.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('error', 'Acesso negado.');
        }

        return view('contact');
    }

    /**
     * Processa o envio do e-mail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('error', 'Acesso negado.');
        }

        $request->validate([
            'recipient_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $admin = Auth::guard('admin')->user();

        Mail::to($request->recipient_email)->send(new Contact([
            'adminName' => $admin->name,       
            'adminEmail' => $admin->email,     
            'subject' => $request->subject,    
            'message' => $request->message,  
        ]));

        return redirect()->route('contact.index')->with('success', 'E-mail enviado com sucesso!');
    }
}