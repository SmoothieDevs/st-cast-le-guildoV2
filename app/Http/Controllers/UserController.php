<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Affiche la page personnelle de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('dashboard')->with('booking', auth()->user()->booking);
    }
}
