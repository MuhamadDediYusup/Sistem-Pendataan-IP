<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['name' => $input['name'], 'password' => $input['password']])) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('error', 'Username atau Password Salah');

    }
}
