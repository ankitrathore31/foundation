<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function LoginPage()
    {
        return view('auth.login');
    }

    public function RegisterPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = Hash::make($validate['password']);
        $user->save();

        return redirect()->route('login.page')->with('success', 'Registration Successfully. ');
    }

    public function login(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validate['email'])->first();

        if ($user && Hash::check($validate['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            if ($user->user_type === 'admin') {
                return redirect()->route('admin');
            } elseif ($user->user_type === 'ngo') {
                return redirect()->route('ngo');
            } else {
                Auth::logout(); // log out invalid role
                return redirect()->back()->withErrors([
                    'email' => 'Unauthorized access.',
                ]);
            }
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page');
    }
}
