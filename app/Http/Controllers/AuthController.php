<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ConnexionRequest;
use App\Http\Requests\InscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auths.register');
    }

    public function registerSave(InscriptionRequest $request)
    {
        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Modifiez le rôle selon vos besoins
        ]); 

        return redirect('/login')->with('success', 'Inscription réussie!');
    }

    public function login()
    {
        return view('auths.login');
    }

    public function loginSave(ConnexionRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials); // Débogage ici
        if (Auth::attempt($credentials)) {
            // L'utilisateur est authentifié
            if (Auth::user()->role === 'admin') {
                return redirect('/ideeAffichage')->with('success', 'Connexion réussie en tant qu\'admin');
            } else {
                return redirect('/index')->with('success', 'Connexion réussie');
            }
        } else {
            // Les informations d'identification sont incorrectes
            return redirect()->back()->with('error', 'Identifiants incorrects');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
