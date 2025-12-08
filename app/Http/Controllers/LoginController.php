<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('login.login', [
                'title' => 'login',
                'active' => 'login'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function authenticate(Request $request)
    {
                $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'

            ]);

                if(Auth::attempt($credentials)){
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }

                return back()->with('loginError', 'Login failed');

            }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
