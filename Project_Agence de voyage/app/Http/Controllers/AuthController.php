<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        $data['title'] = 'Masuk ke Akun';

        return view('auth.login', $data);
    }

    public function postLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'email.exists' => 'Email is not registered',
            'email.email' => 'Email is not valid',
            'password.required' => 'Password is required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if($user->role == 'admin') {
                return redirect()->intended(route('dashboard.index'));
            } else {
                if ($request->has('redirect')) {
                    return redirect($request->redirect);
                }
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Incorrect password!'
        ])->onlyInput('email');
    }

    public function register() {
        $data['title'] = 'Daftar';

        return view('auth.register', $data);
    }

    public function postRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already registered',
            'email.email' => 'Email is not valid',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if(!$user) {
            return redirect()->back()->with('error', 'Registration failed');
        }

        Auth::login($user);

        return redirect()->route('landing-page.index');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing-page.index');
    }
}
