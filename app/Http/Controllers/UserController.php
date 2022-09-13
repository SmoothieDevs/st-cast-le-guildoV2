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
        $booking =  auth()->user()->booking;
        $finishedBookings = auth()->user()->finishedBookings;

        return view('dashboard')->with(compact('booking', 'finishedBookings'));
    }
}
