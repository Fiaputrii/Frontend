<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // // LOGIN (UI)
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         // Redirect berdasarkan role

    //         if (Auth::user()->role === 'mahasiswa') {
    //             return redirect()->route('mahasiswa.index');
    //         } elseif (Auth::user()->role === 'dosen') {
    //             return redirect()->route('dosenwali.index');
    //         }
    //         return redirect()->route('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email atau password salah.',
    //     ])->withInput();
    // }

    // FORM LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

  public function login(Request $request)
    {
       $data = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    $response = Http::post('http://localhost:8080/login', $data);

    if ($response->successful()) {
        $responseData = $response->json();

        // Simpan user ke session
        Session::put('user', $responseData['user']);

        // Redirect berdasarkan role
        $role = $responseData['user']['role'];

        if ($role === 'mahasiswa') {
            return redirect('/mahasiswa/perwalian');
        } elseif ($role === 'dosen wali') {
            return redirect('/dosen/perwalian');
        } else {
            return redirect('/')->with('error', 'Role tidak dikenali');
        }
    }

    return redirect()->back()->with('error', 'Username atau password salah');
    }


    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }

    // REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:mahasiswa,dosen wali'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

   

    // FORM REGISTER
    public function registerForm()
    {
        return view('auth.register');
    }
}
