<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;

class AdminController extends Controller
{

    /**
     * Affiche la page de connexion administrateur
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\AdminLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $request->session()->put('isAdmin', true);

        return redirect()->route('admin.dashboard');
    }
}
