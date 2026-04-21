<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'meno'        => 'required|string|max:255',
            'priezvisko'  => 'required|string|max:255',
            'reg_email'   => 'required|email|unique:users,email',
            'heslo'       => 'required|min:8|confirmed',
        ], [
            'meno.required'       => 'Meno je povinné.',
            'priezvisko.required' => 'Priezvisko je povinné.',
            'reg_email.required'  => 'Email je povinný.',
            'reg_email.email'     => 'Email musí byť platný.',
            'reg_email.unique'    => 'Tento email je už zaregistrovaný.',
            'heslo.required'      => 'Heslo je povinné.',
            'heslo.min'           => 'Heslo musí mať aspoň 8 znakov.',
            'heslo.confirmed'     => 'Heslá sa nezhodujú.',
        ]);

        $user = User::create([
            'meno'             => $request->meno,
            'priezvisko'       => $request->priezvisko,
            'email'            => $request->reg_email,
            'heslo'            => Hash::make($request->heslo),
            'datumRegistracie' => now(),
        ]);

        Auth::login($user);

        return redirect()->back()->with('success', 'Registrácia prebehla úspešne!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_email' => 'required|email',
            'heslo'       => 'required',
        ], [
            'login_email.required' => 'Email je povinný.',
            'login_email.email'    => 'Email musí byť platný.',
            'heslo.required'       => 'Heslo je povinné.',
        ]);

        $credentials = [
            'email'    => $request->login_email,
            'password' => $request->heslo,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->rola === 'admin') {
                return redirect()->route('admin.index');
            }

            return redirect()->back()->with('success', 'Prihlásenie úspešné!');
        }

        return redirect()->back()
            ->withErrors(['login' => 'Nesprávny email alebo heslo.'])
            ->withInput($request->only('login_email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function user(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'success' => true,
                'user'    => [
                    'meno'       => Auth::user()->meno,
                    'priezvisko' => Auth::user()->priezvisko,
                    'email'      => Auth::user()->email,
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'user'    => null
        ]);
    }
}