<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;


class LoginController extends Controller
{

    public function index()
    {

        if (Auth::check()) {
            return view('admin.welcome');
        }
        return view('admin.login');
    }


    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            $this->clearLoginAttempts($request);
            return Auth::user()->user_type == 1
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        $this->incrementLoginAttempts($request);

        return redirect()->route('login')->withErrors(['Invalid Credentials!']);
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts($this->throttleKey($request), 3);
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request));
    }

    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }

    protected function throttleKey(Request $request)
    {
        return strtolower($request->input('email')) . '|' . $request->ip();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }


}
