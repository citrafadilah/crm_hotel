<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            // 'hp' => 'required|numeric',
            // 'akun' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Simpan data user
        User::create([
            'name' => $request->name,
            // 'hp' => $request->hp,
            // 'akun' => $request->akun,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan lakukan LOGIN.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        // Cek peran pengguna setelah autentikasi
        switch (auth()->user()->role) {
            case 'admin':
                return redirect('dbadmin')->with('success', "berhasil masuk ke dashboard admin");
            case 'user':
                return redirect('dbuser')->with('success', "berhasil masuk ke dashboard user");
                // default:
                //     Auth::logout();
                //     return redirect()->route('auth.loginadmin')->withErrors([
                //         'email' => 'Anda tidak memiliki akses ke halaman ini.'
                //     ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/log');
    }

    public function profile()
    {
        return view('userprofile');
    }
}
