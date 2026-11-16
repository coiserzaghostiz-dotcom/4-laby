<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->lowercaseLogin($request);

        $data = $request->validate([
            'login' => ['required', 'string', 'alpha_dash:ascii', 'min:3', 'max:30', 'unique:users,login'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/\A[^\x00]{1,72}\z/'],
        ]);

        try {
            $user = User::create([
                'login' => $data['login'],
                'password' => Hash::make($data['password']),
            ]);
        } catch (UniqueConstraintViolationException) {
            return back()->withErrors(['login' => 'Этот логин уже занят.'])->withInput($request->only('login'));
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $this->lowercaseLogin($request);

        $data = $request->validate([
            'login' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'regex:/\A[^\x00]{1,72}\z/'],
        ]);

        if (! Auth::attempt($data)) {
            return back()->withErrors(['login' => 'Неверный логин или пароль.'])->withInput($request->only('login'));
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    private function lowercaseLogin(Request $request): void
    {
        if (is_string($request->input('login'))) {
            $request->merge(['login' => strtolower($request->input('login'))]);
        }
    }
}
