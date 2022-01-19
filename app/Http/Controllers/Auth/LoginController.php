<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        // if (User::whereEmail($request->email)->first()->is_logged_in == 1) {
        //     return back()->withErrors([
        //         'credentials' => 'Akun tersebut sedang digunakan oleh user selain Anda'
        //     ]);
        // }
        if (Auth::attempt($credentials, true)) {
            $request->user()->isLoggedIn(true);
            $request->session()->regenerate();

            return redirect()->intended('/' . $request->email);
        }

        return back()->withErrors([
            'credentials' => 'Email atau password anda salah.',
        ]);
    }
}
