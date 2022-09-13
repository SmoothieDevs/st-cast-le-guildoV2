<?php

namespace App\Http\Controllers\Auth;

use App\Models\LoginToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SetBookingFinished;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class VerifyTokenController extends Controller
{
    /**
     * Vérifie que le token de connexion est valide, et authentifie l'utilisateur le cas échéant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, $token)
    {
        // Récupération du token dans la base. Si le token n'existe pas, on renvoie une exception
        $token = LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
        // Si la signature du token est invalide ou que le token a expiré, on renvoie une erreur 401
        abort_unless($request->hasValidSignature() && $token->isValid(), 401);
        $token->consume();
        Auth::login($token->user);
        // Lancement de la tâche mettant à jour le statut des réservations terminées
        SetBookingFinished::dispatch($token->user);
        return redirect(RouteServiceProvider::HOME);
    }
}
