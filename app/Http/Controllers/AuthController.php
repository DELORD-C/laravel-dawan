<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index ()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->withSuccess('Signed In');
        }

        return redirect('login')->withSuccess('Login details are not valid');
    }

    public function registration ()
    {
        return view('auth.registration');
    }

    public function handleRegistration (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed In');
        }

        return redirect('login')->withSuccess('Login details are not valid');
    }

    public function create (array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard ()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect('login')->withSuccess('You are not allowed to access this');
    }

    public function logOut() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
