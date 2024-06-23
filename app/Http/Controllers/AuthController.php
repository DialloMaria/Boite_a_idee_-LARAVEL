<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\InscriptionRequest;

// class AuthController extends Controller
// {
//     public function register(){
//         return view('auths.register');
//     }
//     public function registersave(InscriptionRequest $request)
//     {
    
//         User::create([
//             'name' => $request->name,
//             'prenom' => $request->prenom,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'role' => 'user',
//         ]);
    
//         return redirect('/login');
//     }
//     public function login(){
//         return view('auths.login');
//     }
// }

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auths.register');
    }

    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
       
        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Inscription réussie!');
    }

    public function login()
    {
        return view('auths.login');
    }

    public function loginSave(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session->regenerate();
            return redirect()->intended('ideeAffichage');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }
}